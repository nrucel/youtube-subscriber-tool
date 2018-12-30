<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends NR_Controller {

	function __construct(){
		parent::__construct();
		$this->uyelikKontrol();
	}

	function index(){
		$header['title'] = "Anasayfa";
		$header['sayfa'] = "anasayfa";

		$this->load->view("panel/header", $header);
		$this->load->view("panel/anasayfa");
		$this->load->view("panel/footer");
	}

	function aboneGonder(){

		//gelen istekleri değerlere atıyoruz.
		$userid = $this->input->post("link");
		$adet   = intval($this->input->post("adet"));

		//gelen değerler boş ise hata ver.
		if( !$userid  || !$adet )
        {
		$sonuc = array(
            "status"  => "error",
            "message" => "Bilgiler eksik. Kontrol Edin.",
        );

        echo json_encode($sonuc);
        exit;
		}

        //istenilen miktar 0 yada daha küçük ise hata ver.
		if($adet <= 0)
        {
			$sonuc = array(
	            "status"  => "error",
	            "message" => "Girdiğiniz adet hatalı. 0'dan büyük bir rakam olmalı.",
	        );

	        echo json_encode($sonuc);
	        exit;
		}

        //kullanıcının bilgilerini çekiyoruz.
		$uye = $this->Nrmod->tekGetir(array("ytID" => $this->uye->ytID), "uyeler");

        //kullanıcının kredisi 0 veya daha düşük ise hata ver.
		if($uye->aboneKredi <= 0)
        {
			$sonuc = array(
            "status"  => "error",
            "message" => "Takipçi Göndermek için Krediniz kalmadı.",
	        );

	        echo json_encode($sonuc);
			exit;
		}

        //kullanıcı kredisinden fazla girmiş ise miktarı krediye eşitle.
		if($adet > $uye->aboneKredi)
        {
			$adet = $uye->aboneKredi;
		}

        //daha önce takipçi gönderilmişse session'a karışmıyoruz. Gönderilmemişse 0 olarak ayarlıyoruz.
        if(is_null($this->session->userdata("userFollowArray".$userid)))
        {
            $this->session->set_userdata("userFollowArray".$userid, "0");
        }

        //session'a değer atıyoruz
        $userFollowArray = $this->session->userdata("userFollowArray".$userid);


        //auth sisteme gönderilecek değerleri ekliyoruz.
        $data = array(
            "AuthKey"   => $this->config->item("AuthKey"),
            "userID"    => $userid,
            "userIDs"   => $userFollowArray,
            "miktar"    => $adet
        );

        //değerleri auth sisteme post ediyoruz. 
        $yt = $this->Nrmod->post("subscriber",$data);

        //gelen veriyi json tipine dönüştürüyoruz.
        $yt = json_decode($yt,true);

        //eğer işlem başarılı ise..
		if($yt["status"] == "ok")
        {

            //başarılı gönderilen takipçi sayısını değere atayalım.
            $basarili = $yt["data"]['total'];

            //kaç adet takipçi gönderildi ise kullanıcının kredisinden çıkarıyoruz.
            $this->db->query("UPDATE uyeler SET aboneKredi=aboneKredi-".$basarili." WHERE id=".$this->uye->id);

            //kullanıcının güncel takipçi kredisini kaydediyoruz.
            $yeniKredi = $this->uye->aboneKredi-$basarili;

            //takip istediğinde bulunan kullanıcıları bir daha göndermesin diye kaydediyoruz.
            $this->session->set_userdata("userFollowArray".$userid, $yt["data"]["userIDs"]);

            //çıktı için değerleri yazıyoruz..
            $sonuc = array(
                "status"    => "ok",
                "basarili"  => $basarili,
                "kredi"     => $yeniKredi
            );

            //yazdırıyoruz
            print_r(json_encode($sonuc));

        }
        //işlem başarılı olmaz ise
        else
        {
            //dönüşü ekrana yazıyoruz.
            print_r(json_encode($yt));
        }
	

	}

	function checkChannel(){

		$data = array(
            "AuthKey"   => $this->config->item("AuthKey"),
            "channel"   => $this->input->post("channel")
        );

        $yt = $this->Nrmod->post("checkChannel",$data);

        print_r($yt);

	}



	function uyelikKontrol(){

		$uye = $this->session->userdata("uye");

		if(!$uye){
			redirect(base_url());
		}else {

			$kontrol = $this->Nrmod->tekGetir(array("ytID" => $uye['ytID']), "uyeler");
			$sessID = $this->session->userdata("sessID");

			if($kontrol->sessID != $sessID){
				$this->cikis();
			}

			if(!$kontrol){	
				$this->cikis();
			}

			$data['uye'] = $kontrol;
			$this->uye = $kontrol;

			$this->load->vars($data);

		}

	}

	function cikis(){

        $this->session->set_userdata("uye", null);
        $this->session->unset_userdata("sessID");
		$this->session->unset_userdata("rekey");
		redirect(base_url());

	}

	function servis(){
		$header['title'] = "Servis Yok";
		$header['sayfa'] = "servis yok";

		$this->load->view("panel/header", $header);
		$this->load->view("panel/servisyok");
		$this->load->view("panel/footer");
	}

	function referans(){
		$header['title'] = "Referans Sistemi";
		$header['sayfa'] = "Referans Sistemi";

		$this->load->view("panel/header", $header);
		$this->load->view("panel/referans");
		$this->load->view("panel/footer");
	}

	function gecis(){

		$this->load->view("panel/gecis");
	}

	function tools(){

		redirect(base_url("panel"));
	}

}
