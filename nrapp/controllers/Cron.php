<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends NR_Controller {

	public function __construct(){
		parent::__construct();
		$this->cronKey  = $this->config->item("cronKey");
	}

	function krediVer($key){

		if($key != $this->cronKey){
			echo "Hack yapamazsın karşim, uğraşma boşuna :)";
			exit;
		}

		$this->db
		->set("aboneKredi", $this->config->item("tekrarUyeAboneKredi"))
		->where("aboneKredi <", $this->config->item("tekrarUyeAboneKredi"))
		->update("uyeler");
	}


}