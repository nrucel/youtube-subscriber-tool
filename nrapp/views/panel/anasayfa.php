<div class="wrap">
    <section class="app-content">
       <div class="card card-info center">
          </div>
        <div class="row">
            <div class="col-md-8">
                <div id="profile-tabs" class="nav-tabs-horizontal white m-b-lg">
                    <div id="nrc">
                    <header class="widget-header">
                        <h4 class="widget-title">İstediğin Kanala Abone Gönder</h4>
                    </header>
                    <hr class="widget-separator">
                  <div id="profile-stream">
                            <div class="media stream-post">
                                <div class="media-body">
                                    <p><strong>Farklı bir kanala Abone Nasıl Gönderilir?</strong></p>
                                    <p>Aşağıdaki kutuya hangi kanala abone göndermek istiyorsan, o kanalın ID'sini yaz ve Kanalı bul butonuna tıkla.</p>
                                    <p>Sizin Kanalın ID: <?=$uye->ytID;?>
                                    <div class=" m-t-md">
                                       <input type="text" style="margin-bottom:20px;" class="form-control" placeholder="Youtube Kanal ID yazınız örn: UC8o9PDd1tmg9qbR-7DQKr1w" id="username">
                                    	<button type="button" style="display:block;width:100%;margin-bottom:20px;" class="btn btn-danger begendir" id="gonder" onclick="userFollow()"><i class="fas fa-search-plus"></i>  Kullanıcıyı Bul</button>
                                    </div>
                                    <div id="sonuc"> </div>
                                    
                                </div>
                            </div>
                    </div>
                </div>
                <?php if($this->config->item("reklamAktif") == 1) { 
                                            echo "<p>";
                                            echo $this->config->item("reklamKodu");
                                            echo "</p>";
                                        } ?>
            </div>
            </div>
            <? include('sidebar.php'); ?>
</div>
    </section>
</div>		