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
				$data["user_header"]=$this->model_user->read_one($_SESSION["id_user_pelaminan"]);
				$data["user"]=$this->model_user->read_all();
				$data["pesanan"]=$this->model_pesanan->read_all();
				$data["perlengkapan"]=$this->model_perlengkapan->read_all();
				$data["paket"]=$this->model_paket->read_all();
				$this->view("A/Home/index",$data);	
			}
			else{
				header("Location: ".BASE_URL."?a=U/Home/");
				exit();
			}
			
		}
	}
}
?>