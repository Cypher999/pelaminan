<?php
class Home extends Controller{
	public function __construct(){
		$this->Model_user=$this->Model("Model_user");
		$this->php_mail=new php_mailer();
	}
	public function logout(){
		session_unset();
		session_destroy();
		header("Location: ".BASE_URL);
	}
	public function index(){
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
		else{
			$this->view("public/home/index");
		}
	}
	public function login(){
		$this->view("public/login/index");
	}
	public function signup(){
		$this->view("public/signup/index");
	}
	public function do_login(){
		$a["username"]=htmlspecialchars($_POST["nm"]);
		$a["password"]=md5($_POST['ps']);
		$cek_login=$this->Model_user->login($a);
		if(count($cek_login)>0){
			$_SESSION["id_user_pelaminan"]=$cek_login[0]["id_user"];
			if($cek_login[0]["tipe_user"]=="A"){
				echo "<script>window.location.href='".BASE_URL."?a=A/Home/';</script>";
			}
			else if($cek_login[0]["tipe_user"]=="U"){
				echo "<script>window.location.href='".BASE_URL."?a=U/Home/';</script>";
			}
		}
		else{
			$_SESSION["flash"]="<p>Username / Password Salah</p>";
			echo "<script>window.location.href='".BASE_URL."?a=Home/login';</script>";
		}
	}
	public function do_signup(){
		$a["id_user"]=random(5);
		$a["nm_user"]=htmlspecialchars($_POST["nm"]);
		$a["nm_lengkap"]=htmlspecialchars($_POST["nm_lengkap"]);
		$a["email"]=htmlspecialchars($_POST["email"]);
		$a["jekel"]=htmlspecialchars($_POST["jk"]);
		$a["password"]=md5($_POST["ps"]);
		$a["tipe_user"]="U";
		$a["verified"]="1";
		$a["kd_ver"]=random(50);

		$cek_nama=$this->Model_user->read_username($a["nm_user"]);
		$cek_email=$this->Model_user->read_username($a["email"]);
		if(count($cek_nama)>0){
			$_SESSION["flash"]="<p>Nama User sudah digunakan</p>";
			echo "<script>window.location.href='".BASE_URL."?a=Home/login';</script>";
		}
		else{
			if(count($cek_email)>0){
				$_SESSION["flash"]="<p>Email sudah digunakan</p>";
				echo "<script>window.location.href='".BASE_URL."?a=Home/login';</script>";
			}	
			else{
				if($a["password"]==md5($_POST["kf"])){
					echo "<script>window.location.href='".BASE_URL."';</script>";
				}
				else{
					$_SESSION["flash"]="<p>Password Konfirmasi Tidak Sama</p>";
					echo "<script>window.location.href='".BASE_URL."?a=Home/login';</script>";	
				}
			}
		}
		
	}
}
?>