	<div class="wrap p-t-0">

        <footer class="app-footer">

            <div class="clearfix">

                <ul class="footer-menu pull-right">

                    <li>nrucel</li>

                </ul>

                <div class="copyright pull-left">Copyright 2018 &copy; <?=$this->config->item("siteAdresi")?></div>
            </div>

        </footer>

    </div>

	</main>
        <?=$this->config->item("analitik")?>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script type="text/javascript">
      var base_url = "<?=base_url()?>";

        function userFollow(){

            $('#username').attr('readonly', 'readonly');
            $('#gonder').attr('disabled', 'disabled');
            document.getElementById('gonder').innerHTML = "<i class='fas fa-circle-notch fa-spin'></i> Kullanıcı Aranıyor..";

            var username = document.getElementById("username").value;

            if(username == ""){
                $('#sonuc').html('<div style="background:#c50f0f;color:#fff;margin-top:10px;padding:10px">Lütfen boş alan bırakma !</div>');

                $('#password').removeAttr('readonly');
                $('#username').removeAttr('readonly');
                $('#gonder').prop("disabled", false);
                document.getElementById('gonder').innerHTML = '<i class="fas fa-search-plus"></i>  Kanalı Bul';
                return;
            }

                $.ajax({
                type: 'post',
                url: base_url+'panel/checkChannel',
                dataType: 'json',
                data: "channel="+username,
                success: function(data) {
                
                    console.log(data);
                    //return;

                    if(data.status == "ok"){

                            var nrc = document.getElementById("nrc");
                            if(data.data.channelName == null)
                            {
                                var user = data.data.channelID;
                            } else {
                                var user = data.data.channelName;
                            }

                            if(data.data.private == 1)
                            {
                                var abone = "gizli hesap";
                            } else {
                                var abone = data.data.subscriberCount;
                            }



                            nrc.innerHTML = '<header class="widget-header" style="background: #e64343; color: white;"><img src="'+data.data.channelPhoto+'" style="height: 30px;"/>  @'+user+'   Abone: '+abone+'  | İzlenme: '+data.data.viewCount+' | Kredi: <?=$uye->aboneKredi?></header><hr class="widget-separator"><div id="profile-stream"><div class="media stream-post"><div class="media-body"><p><strong>'+user+' </strong></p><p>kaç abone göndermek istiyorsan aşağıdaki kutuya yaz ve gönder butonuna tıkla. Unutma! kredin kadar abone gönderebilirsin..</p><div class=" m-t-md"><input type="hidden" id="link" value="'+data.data.channelID+'"><input type="text" style="margin-bottom:20px;" class="form-control" placeholder="Kaç abone göndermek istiyorsun?" id="adet"><button type="button" style="display:block;width:100%;margin-bottom:20px;" class="btn btn-danger begendir" id="gonder" onclick="takipci()"><i class="fas fa-plus"></i>  Abone Gönder</button></div><div id="sonuc"> </div></div></div></div>';

                                document.getElementById("adet").addEventListener("keyup", function(event) {
                                event.preventDefault();
                                if (event.keyCode === 13) {
                                    document.getElementById("gonder").click();
                                }
                                });

                    } else{

                        $('#sonuc').html('<div style="background:#c50f0f;color:#fff;margin-top:10px;padding:10px"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> hatalı kanal ID girdiniz kontrol edip tekrar deneyin.</div>');
                        $('#username').removeAttr('readonly');
                        $('#gonder').prop("disabled", false);
                        document.getElementById('gonder').innerHTML = '<i class="fas fa-search-plus"></i>  Kanalı Bul';
                    }

                }
                
            });


        }


        document.getElementById("username").addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.keyCode === 13) {
            document.getElementById("gonder").click();
        }
        });


        function takipci() {

            var link = $('#link').val();
            var adet = $('#adet').val();
            $('#adet').attr('readonly', 'readonly');
            $('#gonder').attr('disabled', 'disabled');
            document.getElementById('gonder').innerHTML = "<i class='fas fa-circle-notch fa-spin'></i> Gönderiliyor..";
            $.ajax({
                type: 'post',
                url: base_url+'panel/aboneGonder',
                dataType: 'json',
                data: "link="+link+"&adet="+adet,
                success: function(result) {
                    console.log(result);
                    if(result.status == "ok") {

                        $('#sonuc').html('<div class="panel-body" style="background:#289d28;color:#fff;"><i class="fas fa-check" style="font-weight=bold; font-size:15px;"></i> Başarılı.. '+result.basarili+' takipçi gönderildi. Kalan Kredi: '+result.kredi+'</div>');
                    } else {

                        $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> '+result.message+'</div>');
                    }

                    $('#adet').removeAttr('readonly');
                    $('#username').removeAttr('readonly');
                    $('#gonder').prop("disabled", false);
                    document.getElementById('gonder').innerHTML = '<i class="fas fa-plus"></i>  Takipçi Gönder';

                    }
            });
 
        }
    </script>
    <script src="<?=$gc?>js2/core.min.js"></script>
    <script src="<?=$gc?>js2/app.min.js"></script>

</body>
</html>