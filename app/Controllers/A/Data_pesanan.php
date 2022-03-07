<?php
class Data_pesanan extends Controller{
	public function __construct(){
		$this->model_pesanan=$this->Model("Model_pesanan");
		$this->model_user=$this->Model("Model_user");
		$this->php_mail=new php_mailer();
		if(empty($_SESSION["id_user_pelaminan"])){
			$_SESSION["flash"]="<p>Anda Harus Login dulu</p>";
			header("Location: ".BASE_URL);
			exit();
		}
		else{
			$cek_user=$this->model_user->read_one($_SESSION["id_user_pelaminan"]);
			if($cek_user[0]["tipe_user"]!="A"){
				header("Location: ".BASE_URL."?a=U/Home/");
				exit();
			}
			
		}
	}
	public function Sudah_proses(){
		$a["id_pesanan"]=htmlspecialchars($_GET["key"]);
		$a["f"]["status_pes"]="1";
		$read_data=$this->model_pesanan->read_one($_GET["key"]);
		$data_user=$this->model_user->read_one($read_data[0]["id_user"]);
		$update=$this->model_pesanan->update($a);
		if($update){
			$email_param["to"]=$data_user[0]["email"];
			$email_param["subject"]="Informasi Pemesanan";
			$email_param["content"]="Salam saudara/i ".$data_user[0]["nm_lengkap"]." Transaksi penyewaan pelaminan dengan paker ".$read_data[0]["nm_pkt"]." telah kami proses, terimakasih telah mempercayakan kami sebagai tempat menyewa pelaminan, terimakasih";
						$this->php_mail->set_param($email_param)->do_send();
			$_SESSION["flash"]="<p>pesanan sudah diproses</p>";
			header("Location: ".BASE_URL."?a=A/Data_pesanan/");
		}
		else{
			http_response_code(503);
			echo $this->model_paket->db->show_error();
		}
	}
	public function index(){
		$data["pesanan"]=$this->model_pesanan->read_all();
		$data["user_header"]=$this->model_user->read_one($_SESSION["id_user_pelaminan"]);
		$this->view("A/Data_pesanan/index",$data);
	}
	public function preview(){
		$key=htmlspecialchars($_GET["key"]);
		$data["pesanan"]=$this->model_pesanan->read_one($key);
		$data["user_header"]=$this->model_user->read_one($_SESSION["id_user_pelaminan"]);
		$this->view("A/Data_pesanan/prev",$data);	
	}
	public function print_kwitansi(){
		$key=htmlspecialchars($_GET["key"]);
		$data["pesan"]=$this->model_pesanan->read_one($key);
		$this->view("A/Data_pesanan/kwitansi",$data);	
	}
	public function delete(){
		$key=htmlspecialchars($_GET["key"]);
		$data_lm=$this->model_pesanan->read_one($key);
		$del=$this->model_pesanan->delete($key);
		if($del){			
			$tipe=["jpg","jpeg","png","PNG","JPG","JPEG"];
			foreach ($tipe as $tp) {
			$cek_file="files/bukti_pembayaran/".$data_lm[0]["id_pesanan"].".".$tp;
				if(file_exists($cek_file)){
					unlink($cek_file);
				}
			}
			header("Location: ".BASE_URL."?a=A/Data_pesanan/");
		}
		else{
			http_response_code(503);
			echo $this->model_pesanan->db->show_error();
		}
	}
}
?>