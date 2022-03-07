<?php
class Pesanan_saya extends Controller{
	public function __construct(){
		$this->model_pesanan=$this->Model("Model_pesanan");
		$this->model_user=$this->Model("Model_user");
		$this->model_paket=$this->Model("Model_paket");
		$this->model_perlengkapan=$this->Model("Model_perlengkapan");
		if(empty($_SESSION["id_user_pelaminan"])){
			$_SESSION["flash"]="<p>Anda Harus Login dulu</p>";
			header("Location: ".BASE_URL);
			exit();
		}
		else{
			$cek_user=$this->model_user->read_one($_SESSION["id_user_pelaminan"]);
			if($cek_user[0]["tipe_user"]!="U"){
				header("Location: ".BASE_URL."?a=A/Home/");
				exit();
			}
			
		}
	}
	public function upload_lunas(){
		$id_pesanan=htmlspecialchars($_GET["key"]);
		$nm=$_FILES["bukti"]["name"];
			if($nm!=""){
				$paket=new Files($_FILES["bukti"]);
				$paket->max_size=2000;
				$paket->allowed_type="jpg,JPG,jpeg,JPEG,png,PNG";
				$paket->file_name=$id_pesanan."."."jpg";
				$paket->location="files/bukti_pembayaran/lunas/";
				$paket->overwrite_type=true;
				$status["paket"]=$paket->upload_file();
				if($status["paket"]=="A"){
					$_SESSION["flash"]="<p>Bukti transfer sudah diupload</p>";
					header("Location: ".BASE_URL."?a=U/Pesanan_saya/");
				}
				else if($status["paket"]=="B"){
					$_SESSION["flash"]="<p>Ukuran file melebihi batas</p>";
					header("Location: ".BASE_URL."?a=U/Pesanan_saya/");
				}
				else if($status["paket"]=="C"){
					$_SESSION["flash"]="<p>File tidak sah</p>";
					header("Location: ".BASE_URL."?a=U/Pesanan_saya/");
				}
			}
			else{
				$_SESSION["flash"]="<p>File kosong</p>";
				header("Location: ".BASE_URL."?a=U/Pesanan_saya/");
			}
	}
	public function index(){
		$data["pesanan"]=$this->model_pesanan->read_user($_SESSION["id_user_pelaminan"]);
		$data["user_header"]=$this->model_user->read_one($_SESSION["id_user_pelaminan"]);
		$this->view("U/Pesanan_saya/index",$data);
	}
	public function preview(){
		$key=htmlspecialchars($_GET["key"]);
		$data["pesanan"]=$this->model_pesanan->read_one($key);
		$data["tp"]=["PELAMINAN","TENDA DAN PENTAS","PAKAIAN","MEJA","KURSI","ALAT MAKAN","AKSESORIS"];
		$data["pkt"]=$this->model_paket->read_one($data["pesanan"][0]["id_pkt"]);
		$data["user_header"]=$this->model_user->read_one($_SESSION["id_user_pelaminan"]);
		$this->view("U/Pesanan_saya/prev",$data);	
	}
	public function delete(){
		$key=htmlspecialchars($_GET["key"]);
		$data_lm=$this->model_pesanan->read_one($key);
		if($data_lm[0]["status_pes"]=="0"){
			$del=$this->model_pesanan->delete($key);
			if($del){			
				$tipe=["jpg","jpeg","png","PNG","JPG","JPEG"];
				foreach ($tipe as $tp) {
				$cek_file="files/bukti_pembayaran/".$data_lm[0]["id_pesanan"].".".$tp;
					if(file_exists($cek_file)){
						unlink($cek_file);
					}
				}
				header("Location: ".BASE_URL."?a=U/Pesanan_saya/");
			}
			else{
				http_response_code(503);
				echo $this->model_pesanan->db->show_error();
			}	
		}
		
	}
}
?>