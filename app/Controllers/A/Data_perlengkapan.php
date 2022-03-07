<?php
class Data_perlengkapan extends Controller{
	public function __construct(){
		$this->model_paket=$this->Model("Model_paket");
		$this->model_perlengkapan=$this->Model("Model_perlengkapan");
		$this->model_user=$this->Model("Model_user");
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
	public function index(){
		$data["user_header"]=$this->model_user->read_one($_SESSION["id_user_pelaminan"]);
		$data["pkt"]=$this->model_paket->read_all();
		$data["tp"]=["PELAMINAN","TENDA DAN PENTAS","PAKAIAN","MEJA","KURSI","ALAT MAKAN","AKSESORIS"];
		$this->view("A/Data_perlengkapan/index",$data);
	}
	public function list(){
		if($_GET["key"]=="-"){
			$data["prl"]=$this->model_perlengkapan->read_all();
		}
		else{
			$data["prl"]=$this->model_perlengkapan->read_pkt($_GET["key"]);	
		}
		
		$data["tp"]=["PELAMINAN","TENDA DAN PENTAS","PAKAIAN","MEJA","KURSI","ALAT MAKAN","AKSESORIS"];
		$this->view("A/Data_perlengkapan/list",$data);
	}
	public function form_edit(){
		$key=htmlspecialchars($_GET["key"]);
		$data["prl"]=$this->model_perlengkapan->read_one($key);
		$data["pkt"]=$this->model_paket->read_one($key);
		$data["tp"]=["PELAMINAN","TENDA DAN PENTAS","PAKAIAN","MEJA","KURSI","ALAT MAKAN","AKSESORIS"];
		$this->view("A/Data_perlengkapan/edit",$data);	
	}
	public function delete(){
		$key=htmlspecialchars($_GET["key"]);
		$del=$this->model_perlengkapan->delete($key);
		if($del){			
			header("Location: ".BASE_URL."?a=A/Data_perlengkapan/");
		}
		else{
			http_response_code(503);
			echo $this->model_perlengkapan->db->show_error();
		}
	}
	public function insert(){
		$a["id_prl"]=random(5);
		$a["id_pkt"]=htmlspecialchars($_POST["pkt"]);
		$a["nm_prl"]=htmlspecialchars($_POST["nm_prl"]);
		$a["tipe"]=htmlspecialchars($_POST["tipe"]);
		$a["jml"]=htmlspecialchars($_POST["jml"]);
		$a["sat"]=htmlspecialchars($_POST["sat"]);
		$create=$this->model_perlengkapan->create($a);
		if($create){
			$_SESSION["flash"]="<p>data sudah disimpan</p>";
			header("Location: ".BASE_URL."?a=A/Data_perlengkapan/");
		}
		else{
			http_response_code(503);
			echo $this->model_paket->db->show_error();
		}
	}
	public function update(){
		$a["id_prl"]=htmlspecialchars($_GET["key"]);
		$a["f"]["id_pkt"]=htmlspecialchars($_POST["pkt"]);
		$a["f"]["nm_prl"]=htmlspecialchars($_POST["nm_prl"]);
		$a["f"]["tipe"]=htmlspecialchars($_POST["tipe"]);
		$a["f"]["jml"]=htmlspecialchars($_POST["jml"]);
		$a["f"]["sat"]=htmlspecialchars($_POST["sat"]);
		$update=$this->model_perlengkapan->update($a);
		if($update){
			$_SESSION["flash"]="<p>data sudah diupdate</p>";
			header("Location: ".BASE_URL."?a=A/Data_perlengkapan/");
		}
		else{
			http_response_code(503);
			echo $this->model_paket->db->show_error();
		}
	}
}
?>