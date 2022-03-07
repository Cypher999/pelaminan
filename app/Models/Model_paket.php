<?php
class Model_paket extends Controller{
	public function __construct(){
		$this->db=new Db();
		$this->table="paket";
	}
	public function read_one($id_pkt){
		$id_pkt=$this->db->escape_str($id_pkt);
		return $this->db->table_name($this->table)->select("*")->where("id_pkt='".$id_pkt."'")->result();
	}
	public function delete($id){
		$id=$this->db->escape_str($id);
		return $this->db->table_name($this->table)->where("id_pkt='".$id."'")->delete();
	}
	public function read_all(){
		return $this->db->table_name($this->table)->select("*")->result();
	}
	public function update($id){
		return $this->db->table_name($this->table)->set_var($id["f"])->where("id_pkt='".$id["id_pkt"]."'")->update();
	}
	public function create($var){
		return $this->db->table_name($this->table)->set_var($var)->create();
	}
}
?>