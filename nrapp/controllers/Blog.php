<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends NR_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){

        $head["blogAdi"]      = "Tüm blog Yazıları";
        $head["blogAciklama"] = "sosyal medya blog yazıları, instagram hakkında yazılar";
        $head["blogAnahtar"]  = "instagram takipçi,instagram blog,instagram fenomen";

		$bloglar = json_decode($this->Nrmod->blogGetir(10000));
        $data["blogList"] = $bloglar;

        $this->load->view("blog/header", $head);
        $this->load->view("blog/blogList", $data);
        $this->load->view("blog/footer");

	}

	function blogDetay($blog){

		$path = APPPATH.'views/blog/yazi/'.$blog.'.json';

        if (!file_exists($path))
        {
            show_404();
            exit;
        }
        else
        {
            $oku = file_get_contents($path);
            $oku = json_decode($oku);
        }

        $head["blogAdi"] 	  = $oku->blogAdi;
        $head["blogAciklama"] = $oku->blogAciklama;
        $head["blogAnahtar"]  = $oku->blogAnahtar;

        $data["blogAdi"] 	  = $oku->blogAdi;
        $data["blogDetay"]    = $oku->blogDetay;

        $bloglar = json_decode($this->Nrmod->blogGetir(3));
        $data["bloglar"] = $bloglar;


        
        $this->load->view("blog/header", $head);
        $this->load->view("blog/blog", $data);
        $this->load->view("blog/footer");

	}

}