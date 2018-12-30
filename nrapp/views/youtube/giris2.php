<html lang="tr">
<!--<![endif]-->
<head>
<title>Giriş Yap - <?=$siteAdi?></title>
<meta name="description" content="giriş yap,<?=$siteAdi?>">
<meta name="keywords" content="giriş yap,<?=$siteAdi?>">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta id="viewport" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta http-equiv="Content-Security-Policy" content="default-src *; style-src 'self' http://* 'unsafe-inline'; script-src 'self' http://* 'unsafe-inline' 'unsafe-eval'" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="<?=$dsc?>yeni/css/themify-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900&subset=latin,latin-ext" rel="stylesheet">
<link href="<?=$dsc?>yeni/css/styles.css" rel="stylesheet">
  <link href="<?=$dsc?>yeni/css/default.css" rel="stylesheet" id="color_theme">
<style type="text/css">
    html,
body {
}

body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
  font-size: 16px;
  padding: 15px;
}
@media (min-width: 768px) { 
    .vertical-align {
        display: flex;
        align-items: center;
        padding-top: 15%;
    }
}

.numberCircle {
  border-radius: 50%;
  behavior: url(PIE.htc);
  /* remove if you don't care about IE8 */
  width: 36px;
  height: 36px;
  padding: 6 0 0 0;
  background: red;
  color: #fff;
  text-align: center;
  font: 32px;
  font-weight: bold;
}
.bar {
    float: left;
    width: 55px;
    height: 6px;
    border-radius: 2px;
    background-color: #4b9cdb;
}
.l-10 {animation-delay: 1.56s;}
.load-10 .bar {animation: loadingJ 2s cubic-bezier(.17,.37,.43,.67) infinite;}
@keyframes loadingJ {
  0%,100% {transform: translate(0,0);}
  
  50% {
      transform: translate(80px,0);
      background-color: #f5634a;
      width: 25px;
  }
}

.iconn {
  padding-top: 15px;background-color: red;font-size: 20px;
}
</style>
</head>
  <body style="font-family: 'Titillium Web', sans-serif;">

<div class="container">
  <div class="row align-items-center">
      
      <div class="home-text vertical-align" style="margin: auto;float: none;margin-bottom: 10px;max-width: 600px;">
              <div class="contact-form sm-m-30px-b m-40px-r md-m-0px-r">
         <center><h2 style="font-size:30px"><i class="fa fa-arrow-circle-right"></i> Kod : <code><?=$code?></code></h2></center>
           
            <div class="feature-box-03">
                    <div class="icon iconn">
                      <i class="ti-youtube"></i>
                    </div>
                    <div class="feature-content">
                      <h4><a href="#">Adım 1 : </a></h4>
                      <label style="font-size: 15px;">Telefonunuzdan veya bilgisayarınızdan <a href="https://youtube.com/activate" target="_blank">youtube.com/activate</a> sitesini açınız.</label>
                    </div>
                  </div>
          
          <div class="feature-box-03">
                    <div class="icon iconn">
                      <i class="ti-youtube"></i>
                    </div>
                    <div class="feature-content">
                      <h4><a href="#">Adım 2:  </a></h4>
                      <label style="font-size: 15px;">Açılan sayfaya yukarıdaki kodu giriniz ve youtube hesabınızla izin veriniz.</label>
                    </div>
                  </div>
          <div class="feature-box-03">
                    <div class="icon iconn">
                      <i class="ti-youtube"></i>
                    </div>
                    <div class="feature-content">
                      <h4><a href="#">Adım 3:  </a></h4>
                      <label style="font-size: 15px;">Siteye geri gelin biz sizi otomatik olarak panele yönlendireceğiz.</label>
                    </div>
                  </div>

            <div class="load-10">
                <div class="bar" style="margin: 0 auto;float: none;margin-top: 15px;"></div>
            </div>
            <div id="nCheck"></div>

                    <p class="text-center" style="margin-top: 30px;"><a href="#" onclick="reKod()">Yeni Kod Al</a></p>
                    <p><div id="rekod" style="color: red;text-align: center;"></div></p>
                </div>

              </div>
</div>
</div>

<?=$analitik?>
<script>

    

    var base_url="<?=base_url()?>";

  </script>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

  <script type="text/javascript">
      var base_url = "<?=base_url()?>";

$(document).ready(function() {

        $("#nCheck").load(base_url+"login");

        });

        setInterval(function() {
          $("#nCheck").load(base_url+"login");}, 5000);

        function reKod(){
          $.get( base_url+"reKod", function( data ) {
            $('#rekod').html(data);
          });
        }




  </script>

</body>
</html>