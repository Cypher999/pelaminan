<?php
//kode error: A untuk berhasil, B untuk ukuran melebihi batas, C untuk tipe file yang tidak sah
class Files{
	public $max_size;
	public $allowed_type;
	public $location;
	public $file_name;
	public $overwrite_type=false;
	function __construct($fl){
		$this->fl=$fl;
	}
	function upload_file(){
		$find_type="";		
		$this->max_size=$this->max_size*1000;
		$allowed_type=explode(",",$this->allowed_type);
		$filetype=explode(".",$this->fl["name"])[1];
		$filename=$this->fl["name"];
		$filesize=$this->fl["size"];
		if($filesize<=$this->max_size){
			$tmp_file=$this->fl["tmp_name"];
			foreach($allowed_type as $at){
				if($filetype==$at){
					$find_type=$at;
					break;
				}
			}
			if($find_type!=""){
				if($this->file_name==""){
					$filename=explode(".",$this->fl["name"])[0].".".$find_type;
				}
				else{
					if($this->overwrite_type!=true){
						$filename=$this->file_name.".".$find_type;
					}
					else{
						$filename=$this->file_name;
					}
				}
				if(file_exists($this->location.$filename)){
					unlink($this->location.$filename);
				}
				move_uploaded_file($tmp_file, $this->location.$filename);
				return 'A';
			}
			else{
				return 'C';
			}
		}
		else{
			return 'B';
		}	
	}
}
?>