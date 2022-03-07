<?php
class Data_paket extends Controller{
	public function __construct(){
		$this->model_paket=$this->Model("Model_paket");
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
		$data["paket"]=$this->model_paket->read_all();
		$data["user_header"]=$this->model_user->read_one($_SESSION["id_user_pelaminan"]);
		$this->view("A/Data_paket/index",$data);
	}
	public function form_edit(){
		$key=htmlspecialchars($_GET["key"]);
		$data["paket"]=$this->model_paket->read_one($key);
		$this->view("A/Data_paket/edit",$data);	
	}
	public function delete(){
		$key=htmlspecialchars($_GET["key"]);
		$data_lm=$this->model_paket->read_one($key);
		$del=$this->model_paket->delete($key);
		if($del){			
			$tipe=["jpg","jpeg","png","PNG","JPG","JPEG"];
			foreach ($tipe as $tp) {
			$cek_file="files/foto_paket/".$data_lm[0]["id_pkt"].".".$tp;
				if(file_exists($cek_file)){
					unlink($cek_file);
				}
			}
			header("Location: ".BASE_URL."?a=A/Data_paket/");
		}
		else{
			http_response_code(503);
			echo $this->model_paket->db->show_error();
		}
	}
	public function insert(){
		$a["id_pkt"]=random(5);
		$a["nm_pkt"]=htmlspecialchars($_POST["nm"]);
		$a["hrg"]=htmlspecialchars($_POST["hrg"]);
		$create=$this->model_paket->create($a);
		if($create){
			$nm=$_FILES["foto"]["name"];
			if($nm!=""){
				$paket=new Files($_FILES["foto"]);
				$paket->max_size=1000;
				$paket->allowed_type="jpg,JPG,jpeg,JPEG,png,PNG";
				$paket->file_name=$a["id_pkt"]."."."jpg";
				$paket->location="files/foto_paket/";
				$paket->overwrite_type=true;
				$status["paket"]=$paket->upload_file();
			}
			$_SESSION["flash"]="<p>data sudah disimpan</p>";
			header("Location: ".BASE_URL."?a=A/Data_paket/");
		}
		else{
			http_response_code(503);
			echo $this->model_paket->db->show_error();
		}
	}
	public function update(){
		$a["id_pkt"]=htmlspecialchars($_GET["key"]);
		$a["f"]["nm_pkt"]=htmlspecialchars($_POST["nm"]);
		$a["f"]["hrg"]=htmlspecialchars($_POST["hrg"]);
		$update=$this->model_paket->update($a);
		if($update){
			$nm=$_FILES["foto"]["name"];
			if($nm!=""){
				$cek_file="img/pria/".$a["nik_pria"].".jpeg";
				if(file_exists($cek_file)){
					unlink($cek_file);
				}
				$paket=new Files($_FILES["foto"]);
				$paket->max_size=1000;
				$paket->allowed_type="jpg,JPG,jpeg,JPEG,png,PNG";
				$paket->file_name=$a["id_pkt"]."."."jpg";
				$paket->location="files/foto_paket/";
				$paket->overwrite_type=true;
				$status["paket"]=$paket->upload_file();
			}
			$_SESSION["flash"]="<p>data sudah diupdate</p>";
			header("Location: ".BASE_URL."?a=A/Data_paket/");
		}
		else{
			http_response_code(503);
			echo $this->model_paket->db->show_error();
		}
	}
}
?>