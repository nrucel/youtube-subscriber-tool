<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
|ÖNEMLİ AYARLAR DÜZENLEYİN
|--------------------------------------------------------------------------
*/

//AuthKey
$config['AuthKey'] = "authKeyyz";

//Google recaptcha key ve secret
define('GoogleDogrulamaKey', '6LdhJQ0UAAAAAGZ5I9YJEBB3hjP436rmiJ');
define('GoogleDogrulamaSecret', '6LdhJQ0UAAAAAPk5-d-8Ir5hpdP9Er');

//cron çalıştırırken kullanılacak key
$config['cronKey'] = "nrcl";

/*
|--------------------------------------------------------------------------
| Sistem Genel Ayarları
|--------------------------------------------------------------------------
|
| Aşağıda sistemin çalışabilmesi için tüm ayarlar eklenmiştir.
| ayarların açıklamaları üstlerinde detaylı şekilde yazmaktadır.
| Gerekli düzeltmeleri yapabilirsiniz..
|
*/

//sitenizin başlığı
$config['siteAdi'] = "nettakipci";

//sitenizin adresi. adresi otomatik alır.
$config['siteAdresi'] = $_SERVER['SERVER_NAME'];

//Yönetici Mail Adresi
$config['varsayilanGonderenMaili'] = "nurullahcelik@yandex.com";
$config['varsayilanGonderenIsmi'] = $config['siteAdresi'];
$config['bildirimEmailleri'] = array("nurullahcelik@yandex.com");

//görünürde olan mail @ yerine [at] yazınız
$config['gorunurMail'] = "nurullahcelik[at]yandex.com";


//iletişim telefon numarası
$config['yoneticiTel'] = "+90 850 304 16 49";

//whos.amung - google vb. izleme kodlarını ekleyebilirsin.
$config['analitik'] = '<div id="counter" style="display:none;"><img src="https://whos.amung.us/widget/nrucel.png"></div>';

//bir hesabın aynı anda kaç tarayıcıda yada sekmede açılsın. öneri: 1
$config['vipAyniAndaKacSekme'] = 1;

//Google Console'da siteniz için doğrulama kodunu yaz
$config['googleVerify'] = "";

/*
|--------------------------------------------------------------------------
|KREDİ VE GİRİŞ AYARLARI
|--------------------------------------------------------------------------
*/

//ilk Kez giriş yapan birine verilecek takipçi kredisi
$config['yeniUyeAboneKredi'] = 20;
//tekrar giriş yapan birine verilecek takipçi kredisi
$config['tekrarUyeAboneKredi'] = 20;

//ilk Kez giriş yapan birine verilecek beğeni kredisi
$config['yeniUyeBegeniKredi'] = 30;
//tekrar giriş yapan birine verilecek beğeni kredisi
$config['tekrarUyeBegeniKredi'] = 30;

//referans getiren birine verilecek abone kredisi
$config['refKredi'] = 20;


/*
|--------------------------------------------------------------------------
|REKLAM AYARLARI
|--------------------------------------------------------------------------
|
| Aşağıdaki reklam kodu responsivedir. düzgün çalışmaktadır
| kendi reklam kodunuz için sadece sayıları değiştirin
| data-ad-client="" ve data-ad-slot="" değiştirmeniz yeterli
|
*/

//Reklamları aktif etmek için 1 , pasif yapmak için 0 yazın
$config['reklamAktif'] = 0;
$config['reklamKodu'] = '<center><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle"	style="display:block"	data-ad-client="ca-pub-87734405566"	data-ad-slot="957654"	data-ad-format="auto"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></center>';


/*
|--------------------------------------------------------------------------
|TASARIM KLASÖRLERİ
|--------------------------------------------------------------------------
|
|$_SERVER['SERVER_NAME'] Sitenin adresini otomatik alır
|
*/

//Anasayfa için css,jss kodlarının olduğu klasor
$config['disSayfaConfig'] = "https://".$_SERVER['SERVER_NAME']."/assets/dis/";

//genel css js dosyalarının barındığı klasor
$config['genelConfig'] = "https://".$_SERVER['SERVER_NAME']."/assets/";

/*
|--------------------------------------------------------------------------
|MENU AYARLARI
|--------------------------------------------------------------------------
|
|array şeklinde çalışır
|menu = menünün adı
|link = menünün yönlendirelecği adres
|yeniSekme = yeni sekmede açılmasını istiyorsanız 1 yapın
|altMenu = açılır menu olduğunu belirtir içine eklenecek menüler aynı sistem array olmalı
|
*/

$config['disMenuler'] = array(
	array(
		"menu" => "Satın Al",
		"link" => "https://".$_SERVER['SERVER_NAME']."/satin-al",
		"yeniSekme" => 0
	),
	array(
		"menu" => "Blog",
		"link" => "https://".$_SERVER['SERVER_NAME']."/blog",
		"yeniSekme" => 0
	),
	array(
		"menu" => "Facebook Hile",
		"altMenu" => array(
			array(
				"menu" => "Facebook Beğeni",
				"link" => "https://begen.app",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Emoji Beğeni",
				"link" => "https://begen.app/reaction",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Sayfa Beğeni",
				"link" => "https://begen.app/sayfabegeni",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Takipçi Arttırma",
				"link" => "https://begen.app/takipci",
				"yeniSekme" => 1
			),
		)
	),
	array(
		"menu" => "instagram Hile",
		"altMenu" => array(
			array(
				"menu" => "Instagram Takipçi",
				"link" => "https://takipapp.com",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Instagram Takipçi 2",
				"link" => "https://igturk.net",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Instagram Takipçi 3",
				"link" => "https://begenapp.io",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Instagram Takipçi 4",
				"link" => "https://takipciapp.net",
				"yeniSekme" => 1
			),
		)
	),
	array(
		"menu" => "Youtube Hile",
		"altMenu" => array(
			array(
				"menu" => "Youtube Abone 1",
				"link" => "https://aboneapp.com",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Youtube Beğeni",
				"link" => "https://aboneapp.com",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Youtube Yorum",
				"link" => "https://aboneapp.com",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Youtube Abone 2",
				"link" => "https://aboneapp.net",
				"yeniSekme" => 1
			),
		)
	),
);