<?php
class Data_user extends Controller{
	public function __construct(){
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
		$data["user"]=$this->Model("Model_user")->read_all();
		$this->view("A/Data_user/index",$data);
	}
	public function delete(){
		$key=htmlspecialchars($_GET["key"]);
		$del=$this->model_user->delete($key);
		if($del){		
			$tipe=["jpg","jpeg","png","PNG","JPG","JPEG"];
			foreach ($tipe as $tp) {
			$cek_file="img/foto_profil/".$key.".".$tp;
				if(file_exists($cek_file)){
					unlink($cek_file);
				}
			}	
			header("Location: ".BASE_URL."?a=A/Data_user/");
		}
		else{
			http_response_code(503);
			echo $this->model_akta_nikah->db->show_error();
		}
	}
	public function form_edit_nm(){
		if(isset($_SESSION["id_user_pelaminan"])){
		$data=$this->model("Model_user")->read_one($_POST["a"]);
		$this->view("A/Data_user/edit_nm",$data);
		}
	}

	public function form_edit_pas(){
		if(isset($_SESSION["id_user_pelaminan"])){
		$data=$this->model("Model_user")->read_one($_POST["a"]);
		$this->view("A/Data_user/edit_pas",$data);
		}
	}
	public function ubah_ps(){
		$a["id_user"]=$_SESSION["id_user_pelaminan"];
		$a["f"]["password"]=md5($_POST["br"]);
		$read_lm=$this->model_user->read_one($a["id_user"]);
		if(md5($_POST["lm"])!=$read_lm[0]["password"]){
			$_SESSION["flash"]="<p>Password lama tidak sama</p>";
			header("Location: ".BASE_URL."?a=A/Data_user/");
			exit();
		}
		else{
			if(md5($_POST["br"])!=md5($_POST["kf"])){	
				$_SESSION["flash"]="<p>Password konfirmasi tidak sama</p>";
				header("Location: ".BASE_URL."?a=A/Data_user/");
				exit();
			}
			else{
				$update_ps=$this->model_user->update($a);
				if($update_ps){
					$_SESSION["flash"]="<p>Password sudah dirubah</p>";
					header("Location: ".BASE_URL."?a=A/Data_user/");
				}
				else{
					echo $this->model_user->db->show_error();
					exit();	
				}
			}
		}
	}
	public function ubah_nm(){
		$a["id_user"]=$_SESSION["id_user_pelaminan"];
		$a["f"]["nm_user"]=htmlspecialchars($_POST["nm"]);
		$read_lm=$this->model_user->read_one($a["id_user"]);
		$cek_nm=$this->model_user->cek_nama($a["f"]["nm_user"]);
		if((count($cek_nm)>0)&&($read_lm[0]["nm_user"]!=$a["f"]["nm_user"])){
			$_SESSION["flash"]="<p>Nama sudah ada</p>";
			header("Location: ".BASE_URL."?a=A/Data_user/");
			exit();
		}
		else{
			$update_nm=$this->model_user->update($a);
			if($update_nm){
				$_SESSION["flash"]="<p>Nama sudah dirubah</p>";
				header("Location: ".BASE_URL."?a=A/Data_user/");
			}
			else{
				echo $this->model_user->db->show_error();
				exit();	
			}
		}
	}
}
?>