<?php
class Model_perlengkapan extends Controller{
	public function __construct(){
		$this->db=new Db();
		$this->table="perlengkapan";
	}
	public function read_one($id_prl){
		$id_prl=$this->db->escape_str($id_prl);
		return $this->db->table_name($this->table)->select("perlengkapan.*,paket.*")->inner_join(["paket on perlengkapan.id_pkt=paket.id_pkt"])->where("id_prl='".$id_prl."'")->result();
	}
	public function read_pkt($id_pkt){
		$id_pkt=$this->db->escape_str($id_pkt);
		return $this->db->table_name($this->table)->select("perlengkapan.*,paket.*")->inner_join(["paket on perlengkapan.id_pkt=paket.id_pkt"])->where("paket.id_pkt='".$id_pkt."'")->result();
	}
	public function read_perlengkapan($a){
		$a["id_pkt"]=$this->db->escape_str($a["id_pkt"]);
		$a["tipe"]=$this->db->escape_str($a["tipe"]);
		return $this->db->table_name($this->table)->select("perlengkapan.*,paket.*")->inner_join(["paket on perlengkapan.id_pkt=paket.id_pkt"])->where("paket.id_pkt='".$a["id_pkt"]."' and perlengkapan.tipe='".$a["tipe"]."'")->result();
	}
	public function delete($id){
		$id=$this->db->escape_str($id);
		return $this->db->table_name($this->table)->where("id_prl='".$id."'")->delete();
	}
	public function read_all(){
		return $this->db->table_name($this->table)->select("perlengkapan.*,paket.*")->inner_join(["paket on perlengkapan.id_pkt=paket.id_pkt"])->result();
	}
	public function update($id){
		return $this->db->table_name($this->table)->set_var($id["f"])->where("id_prl='".$id["id_prl"]."'")->update();
	}
	public function create($var){
		return $this->db->table_name($this->table)->set_var($var)->create();
	}
}
?>