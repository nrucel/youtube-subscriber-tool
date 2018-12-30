<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends NR_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function login(){


        $data = array(
            "AuthKey"   => $this->config->item("AuthKey"),
            "code"      => $this->session->userdata("code")
        );

        $ig = json_decode($this->Nrmod->post("checkCode",$data),true);

        if($ig["status"] == "ok")
        {
            $this->session->unset_userdata("code");
            $this->session->unset_userdata("user_code");
            $veriler = [
                "ytID"          => $ig["data"]["channelID"],
                "adSoyad"       => $ig["data"]["channelName"],
                "ytFoto"        => $ig["data"]["channelPhoto"],
                "aboneSayisi"   => $ig["data"]["subscriberCount"],
                "videoSayisi"   => $ig["data"]["videoCount"],
                "izlenmeSayisi" => $ig["data"]["viewCount"],
                "yorumSayisi"   => $ig["data"]["commentCount"],
                "ipAdres"       => $this->input->ip_address()
            ];

            $kontrol = $this->Nrmod->tekGetir(["ytID" => $ig["data"]["channelID"], ], "uyeler");


            if($kontrol)
            {

                $kaydet = $this->Nrmod->duzenle(["ytID" => $ig["data"]["channelID"]], "uyeler", $veriler);

            }
            else
            {
                //referans linki ilemi gelmiş diye bakıyorum
                if(isset($_COOKIE['referans']) and $_COOKIE['referans'])
                {
                    //daha önce birine referans olmuşmu
                    $ref = $this->Nrmod->tekGetir(["referans" => $_COOKIE['referans']], "uyeler");
                    if($ref)
                    {
                        $refKredi = $this->config->item("refKredi");
                        $this->db->query("UPDATE uyeler SET aboneKredi=aboneKredi+".$refKredi." WHERE id=".$ref->id);
                    }

                    //üyeyi ref yapan kişiyi kaydediyoruz
                    $veriler['refSahip']      = $ref->id;
                }

                $veriler['aboneKredi']        = $this->config->item("yeniUyeAboneKredi");
                $veriler['begeniKredi']       = $this->config->item("yeniUyeBegeniKredi");
                $veriler['referans']          = bin2hex(openssl_random_pseudo_bytes(16));

                $kaydet = $this->Nrmod->ekle("uyeler", $veriler);

            }

            if($kaydet)
            {

                $this->session->set_userdata("rekey", $ig["data"]["channelID"]);
                
                $this->session->set_userdata("uye", $veriler);
                print_r('<script type="text/javascript">window.location = "'.base_url("kontrol").'"</script>');
            }
            else
            {

                print_r('<script type="text/javascript">window.location = "'.base_url().'"</script>');;
            }
        }
    }

    function reKod(){

        if($this->session->userdata("reTime"))
        {
            $ilk = strtotime($this->session->userdata("reTime"));
            $kalan = strtotime(date("Y-m-d H:i:s")) - $ilk;


            
            if($kalan > 120)
            {
                $this->session->unset_userdata("code");
                $this->session->unset_userdata("user_code");
                $this->session->unset_userdata("reTime");
                echo '<meta http-equiv="refresh" content="0; URL='.base_url("giriss").'" />';
                exit;
            }
            else
            {
                $zaman = 120 - $kalan;
                print_r($zaman." saniye sonra yenileyebilirsin");
                exit;
            }


        }
        else
        {

            $this->session->unset_userdata("code");
            $this->session->unset_userdata("user_code");
            $this->session->set_userdata("reTime", date("Y-m-d H:i:s"));
            echo '<meta http-equiv="refresh" content="0; URL='.base_url("giriss").'" />';
            exit;
        }
    }


    function reKey(){


        if($this->session->userdata("rekey"))
        {
            
            $url     = 'https://www.google.com/recaptcha/api/siteverify';
            $data    = array(
                'secret'   => GoogleDogrulamaSecret,
                'response' => $this->input->post("captcha")
            );

            $options = array(
                'http' => array(
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );

            $context = stream_context_create($options);
            @$verify = file_get_contents($url, FALSE, $context);
            $captcha_success = json_decode($verify);
            if($captcha_success->success == FALSE) {
                print_r(json_encode(array("status" => "error","message" => "Güvenlik doğrulamasını geçmen gerekiyor. Yukarıda ben robot değilim'i işaretle.")));
                exit;
            } else {

                $rand = rand(1, 9999999999);
                $user_id = $this->session->userdata("rekey");
                $this->Nrmod->duzenle(["ytID" => $user_id], "uyeler", ["sessID" => $rand]);
                $this->session->set_userdata("sessID", $rand);
                $this->session->unset_userdata("rekey");
                
                print_r(json_encode(array("status" => "ok","message" => "Başarılı. Yönlendiriliyorsun..")));
                exit;

            }

        } else {
            print_r(json_encode(array("status" => "error","message" => "hata oluştu. Sayfayı yenileyip tekrar giriş yapın.")));
            exit;
        }


    }

}