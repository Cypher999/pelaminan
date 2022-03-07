<?php
require "html2pdf/vendor/autoload.php";

use Spipu\Html2Pdf\Html2Pdf;
class html_2_pdf{
	private $val;
	private $htm;
	public function __construct(){
		$this->htm=new Html2Pdf();
	}
	public function set_write($a){
		$this->val=$a;
		return $this;
	}
	public function result(){
		$this->htm->WriteHTML($this->val);
		$this->htm->setTestTdInOnePage(false);
		$this->htm->output();
	}
}

?>