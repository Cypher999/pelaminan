<?php
class Model_user extends Controller{
	public function __construct(){
		$this->db=new Db();
		$this->table="user";
	}
	public function login($a){
		$a["username"]=$this->db->escape_str($a["username"]);
		return $this->db->select("*")->table_name($this->table)->where("(nm_user='".$a["username"]."' or email='".$a["username"]."') and password='".$a["password"]."'")->result();
	}
	public function read_one($a){
		$a=$this->db->escape_str($a);
		return $this->db->select("*")->table_name($this->table)->where("id_user='".$a."'")->result();
	}
	public function read_ver($a){
		$a=$this->db->escape_str($a);
		return $this->db->select("*")->table_name($this->table)->where("kd_ver='".$a."'")->result();
	}
	public function read_email($a){
		$a=$this->db->escape_str($a);
		return $this->db->select("*")->table_name($this->table)->where("email='".$a."'")->result();
	}
	public function read_username($a){
		$a=$this->db->escape_str($a);
		return $this->db->select("*")->table_name($this->table)->where("nm_user='".$a."'")->result();
	}
	public function read_all(){
		return $this->db->select("*")->table_name($this->table)->result();
	}
	public function cek_nama($a){
		$a=$this->db->escape_str($a);
		return $this->db->select("*")->table_name($this->table)->where("nm_user='".$a."'")->result();
	}
	public function update($a){
		$a["id_user"]=$this->db->escape_str($a["id_user"]);
		return $this->db->table_name($this->table)->set_var($a["f"])->where("id_user='".$a["id_user"]."'")->update();
	}
	public function create($a){
		return $this->db->table_name($this->table)->set_var($a)->create();
	}
	public function delete($a){
		$a=$this->db->escape_str($a);
		return $this->db->table_name($this->table)->where("id_user='".$a."'")->delete();
	}
}
?>