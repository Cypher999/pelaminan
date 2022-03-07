<?php
class Daftar_paket extends Controller{
	public function __construct(){
		$this->Model_user=$this->Model("Model_user");
		$this->Model_paket=$this->Model("Model_paket");
		$this->model_perlengkapan=$this->Model("Model_perlengkapan");
		if(isset($_SESSION["id_user_pelaminan"])){
			$cek_user=$this->Model_user->read_one($_SESSION["id_user_pelaminan"]);
			
			if($cek_user[0]["tipe_user"]=="A"){
				header("Location: ".BASE_URL."?a=A/Home/");
				exit();
			}
			else{
				header("Location: ".BASE_URL."?a=U/Home/");
				exit();
			}
		}
	}
	public function index(){
		$data["paket"]=$this->Model_paket->read_all();
		$this->view("public/Daftar_paket/index",$data);
	}	
	public function prev(){
		$key=htmlspecialchars($_GET["key"]);
		$data["pesanan"]=$this->Model_paket->read_one($key);
		$data["tp"]=["PELAMINAN","TENDA DAN PENTAS","PAKAIAN","MEJA","KURSI","ALAT MAKAN","AKSESORIS"];
		$data["pkt"]=$this->Model_paket->read_one($data["pesanan"][0]["id_pkt"]);
		$this->view("public/Daftar_paket/prev",$data);
	}
}
?>