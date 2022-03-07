<?php
class Model_pesanan extends Controller{
	public function __construct(){
		$this->db=new Db();
		$this->table="pesanan";
	}
	public function read_one($id_pesanan){
		$id_pesanan=$this->db->escape_str($id_pesanan);
		return $this->db->select("paket.*,user.*,pesanan.*")->inner_join(["paket on pesanan.id_pkt=paket.id_pkt","user on pesanan.id_user=user.id_user"])->table_name($this->table)->where("pesanan.id_pesanan='".$id_pesanan."'")->result();
	}
	public function read_user($id_user){
		$id_user=$this->db->escape_str($id_user);
		return $this->db->select("paket.*,user.*,pesanan.*")->inner_join(["paket on pesanan.id_pkt=paket.id_pkt","user on pesanan.id_user=user.id_user"])->table_name($this->table)->where("pesanan.id_user='".$id_user."'")->result();
	}
	public function read_all(){
		return $this->db->table_name($this->table)->inner_join(["paket on pesanan.id_pkt=paket.id_pkt","user on pesanan.id_user=user.id_user"])->select("paket.*,user.*,pesanan.*")->result();
	}
	public function update($id){
		return $this->db->table_name($this->table)->set_var($id["f"])->where("id_pesanan='".$id["id_pesanan"]."'")->update();
	}
	public function delete($id){
		return $this->db->table_name($this->table)->where("id_pesanan='".$id."'")->delete();
	}
	public function create($var){
		return $this->db->table_name($this->table)->set_var($var)->create();
	}
}
?>