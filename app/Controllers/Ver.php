<?php
class Ver extends Controller{
	public function __construct(){
		$this->model_user=$this->Model("Model_user");
	}
	public function index(){
		$key=htmlspecialchars($_GET["ver_key"]);
		$verifikasi=$this->model_user->read_ver($key);
		if(count($verifikasi)>0){
			if($verifikasi[0]["verified"]==0){
				$a["id_user"]=$verifikasi[0]["id_user"];
				$a["f"]["verified"]="1";
				$update=$this->model_user->update($a);
				if($update){
					echo "Selamat, akun anda sudah diverifikasi,<br> <a href='".BASE_URL."'>Kembali</a>";
				}
				else{
					echo $this->model_user->db->show_error();
				}
			}
		}
	}
}
?>