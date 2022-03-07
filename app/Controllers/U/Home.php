<?php
class Home extends Controller{
	public function __construct(){
		$this->model_user=$this->Model("Model_user");
		$this->model_pesanan=$this->Model("Model_pesanan");
		$this->model_perlengkapan=$this->Model("Model_perlengkapan");
		$this->model_paket=$this->Model("Model_paket");
	}
	
	public function index(){
		if(empty($_SESSION["id_user_pelaminan"])){
			$_SESSION["flash"]="<p>Anda harus login dulu</p>";
			header("Location: ".BASE_URL."");
		}
		else{
			$cek_user=$this->model_user->read_one($_SESSION["id_user_pelaminan"]);
			if($cek_user[0]["tipe_user"]=="A"){
				header("Location: ".BASE_URL."?a=A/Home/");
			}
			else{
				$data["user_header"]=$this->model_user->read_one($_SESSION["id_user_pelaminan"]);
				$this->view("U/Home/index",$data);
			}
			
		}
	}
}
?>