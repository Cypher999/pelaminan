<?php
class Data_paket extends Controller{
	public function __construct(){
		$this->model_paket=$this->Model("Model_paket");
		$this->model_user=$this->Model("Model_user");
		$this->model_perlengkapan=$this->Model("Model_perlengkapan");
		$this->model_pesanan=$this->Model("Model_pesanan");
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
	public function index(){
		$data["paket"]=$this->model_paket->read_all();
		$data["user_header"]=$this->model_user->read_one($_SESSION["id_user_pelaminan"]);
		$this->view("U/Data_paket/index",$data);
	}
	public function pesan(){
		$data["tp"]=["PELAMINAN","TENDA DAN PENTAS","PAKAIAN","MEJA","KURSI","ALAT MAKAN","AKSESORIS"];
		$data["pkt"]=$this->model_paket->read_one(htmlspecialchars($_GET["key"]));
		$data["user_header"]=$this->model_user->read_one($_SESSION["id_user_pelaminan"]);
		$this->view("U/Data_paket/pesan",$data);
	}
	public function kirim_pesan(){
		$a["id_pesanan"]=random(5);
		$a["id_user"]=$_SESSION["id_user_pelaminan"];
		$a["id_pkt"]=htmlspecialchars($_GET["key"]);
		$a["tgl_pes"]=date("Y-m-d H:i:s");
		$a["tgl_resepsi"]=htmlspecialchars($_POST["tgl_resepsi"]);
		$a["tgl_bongkar"]=htmlspecialchars($_POST["tgl_bongkar"]);
		$a["tgl_pasang"]=htmlspecialchars($_POST["tgl_pasang"]);
		$a["tgl_akad_nikah"]=htmlspecialchars($_POST["tgl_akad"]);
		$a["alt_pes"]=htmlspecialchars($_POST["alt_pes"]);
		$a["notel"]=htmlspecialchars($_POST["notel"]);
		$a["status_pes"]="0";
		$simpan=$this->model_pesanan->create($a);
		if($simpan){
			$nm=$_FILES["bukti"]["name"];
			if($nm!=""){
				if($_POST["lok"]=="0"){
					$lokasi="files/bukti_pembayaran/DP/";
				}
				else if($_POST["lok"]=="1"){
					$lokasi="files/bukti_pembayaran/lunas/";
				}
				$paket=new Files($_FILES["bukti"]);
				$paket->max_size=2000;
				$paket->allowed_type="jpg,JPG,jpeg,JPEG,png,PNG";
				$paket->file_name=$a["id_pesanan"]."."."jpg";
				$paket->location=$lokasi;
				$paket->overwrite_type=true;
				$status["paket"]=$paket->upload_file();
				if($status["paket"]=="A"){
					header("Location: ".BASE_URL."?a=U/Pesanan_saya/preview&&key=".$a["id_pesanan"]);	
				}
				else if($status["paket"]=="B"){
					$_SESSION["flash"]="<p>Ukuran file melebihi batas</p>";
					header("Location: ".BASE_URL."?a=U/Data_paket/pesan&&key=".$a["id_pkt"]);	
				}
				else if($status["paket"]=="C"){
					$_SESSION["flash"]="<p>File tidak sah</p>";
					header("Location: ".BASE_URL."?a=U/Data_paket/pesan&&key=".$a["id_pkt"]);	
				}
			}
			else{
				$_SESSION["flash"]="<p>Buktri transfer kosong</p>";
				header("Location: ".BASE_URL."?a=U/Data_paket/pesan&&key=".$a["id_pkt"]);	
			}
		}
		else{
			echo $this->model_pesanan->db->show_error();
		}
	}
}
?>