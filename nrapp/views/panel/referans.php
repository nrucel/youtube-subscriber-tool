<div class="wrap">
    <section class="app-content">
       <div class="card card-info center">
          </div>
        <div class="row">
            <div class="col-md-8">
                <div id="profile-tabs" class="nav-tabs-horizontal white m-b-lg">
                    <div id="nrc">
                    <header class="widget-header">
                        <h4 class="widget-title">Kredi Kazan</h4>
                    </header>
                    <hr class="widget-separator">
                  <div id="profile-stream">
                            <div class="media stream-post">
                                <div class="media-body">
                                    <p style="font-size: 15px;"><strong>Getirdiğin her üye için <?=$this->config->item("refKredi")?> kredi kazan!</strong></p>
                                    <p style="font-size: 15px;">ister kendin hesap oluşturup sisteme sok, ister arkadaşlarını çağır. Getirdiğin her üye için kredi veriyoruz..</p>
                                    
                                    <p style="font-size: 18px;"><strong style="color: red">referans linki: </strong><a href="<?=base_url("?r=".$uye->referans);?>" target="_blank"><?=base_url("?r=".$uye->referans)?></a>
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