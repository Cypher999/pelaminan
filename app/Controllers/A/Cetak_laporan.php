<?php
class Cetak_laporan extends Controller{
	public function __construct(){
		$this->model_pesanan=$this->Model("Model_pesanan");
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
		$data["bulan"]=["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
		$data["user_header"]=$this->model_user->read_one($_SESSION["id_user_pelaminan"]);
		$this->view("A/Cetak_laporan/index",$data);
	}
	public function cetak(){
		$data["pesanan"]=$this->model_pesanan->read_all();
		$data["real"]=[];
		$data["bulan"]=["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
		if((htmlspecialchars($_POST["bln"])=="all")&&(htmlspecialchars($_POST["thn"])=="all")){
			$data["real"]=$data["pesanan"];
		}
		else if((htmlspecialchars($_POST["bln"])=="all")&&(htmlspecialchars($_POST["thn"])!="all")){
			foreach($data["pesanan"] as $dt){
				$tgl=date_create($dt["tgl_pes"]);
				$tahun=date_format($tgl,"Y");
				if($tahun==$_POST["thn"]){
					array_push($data["real"], $dt);
				}
			}
		}
		else if((htmlspecialchars($_POST["bln"])!="all")&&(htmlspecialchars($_POST["thn"])=="all")){
			foreach($data["pesanan"] as $dt){
				$tgl=date_create($dt["tgl_pes"]);
				$bulan=date_format($tgl,"m");
				if($bulan==$_POST["bln"]){
					array_push($data["real"], $dt);
				}
			}
		}
		else if((htmlspecialchars($_POST["bln"])!="all")&&(htmlspecialchars($_POST["thn"])!="all")){
			foreach($data["pesanan"] as $dt){
				$tgl=date_create($dt["tgl_pes"]);
				$tahun=date_format($tgl,"Y");
				$bulan=date_format($tgl,"m");
				if(($tahun==$_POST["thn"])&&($bulan==$_POST["bln"])){
					array_push($data["real"], $dt);
				}
			}
		}
		$this->view("A/Cetak_laporan/cetak",$data);	
	}
}
?>