# nrucel YT Tools
example/örnek: https://aboneapp.com | Forum: https://nrucel.me/forum | Discord: https://discord.gg/veWZcfD
<br>
**TR:** bu araç ile youtube abone gönderme işlemlerini yapabilirsiniz. Bu scripti kullanabilmeniz için benim tarafımdan size verilmiş bir anahtara ihtiyacınız olacak. Bu anahtar ile sistem sorunsuz çalışacaktır. Sistem api üzerine kuruludur. proxy gerektirmez.
<br /><br />
**Anahtarı nasıl alırım ?** <br />
nurullahcelik@yandex.com adresine mail atınız.<br />
e-mail başlık:  nrucel ig tools key<br />
e-mail içerik: giriş için eposta, şifre ve Ad soyad.<br />

**ENG:** With this tool, you can do instagram login, followers increase and liking. In order to use this script, you will need a key given by me. With this key the system will run smoothly. The system is based on api. No proxy required.
<br /><br />
**How do I get the key?**<br />
Send an e-mail to nurullahcelik@yandex.com.<br />
e-mail title: nrucel ig tools key<br />
e-mail content: login for email, password and real name.<br />

## Kurulum / Setup
**1)** public_html dizinine tüm dosyaları yükleyin. / Upload all files to the public_html directory.<br />
**2)** nrapp/config/database.php veritabanı bilgilerinizi girin. / Enter your database information.
```php
	'username' => 'db_username',
	'password' => 'db_password',
	'database' => 'db_username',
```
**3)** veritabanına nrIGdb.sql.gz dosyasını yükleyin. / Install the nrIGdb.sql.gz file in the database.

**admin panel**: site.com/vip <br />
**email:** nurullahcelik@yandex.com<br />
**password:** nrcl<br />




## **cron ayarları / cron setting**
**site.com/cron/krediVer/cronkey** ( kredi yenileme / credit refresh )<br />


## Önemli Ayarlar / Important Settings
**dosya / file:** nrapp/config/nrsetting.php

**size verdiğim key / the key I gave you**
```php
//AuthKey
$config['AuthKey'] = "bced49e4a04cacb38ff54f0e0db999";
```

**cronkey ayarı / cronkey setting**
```php
$config['cronKey'] = "cronKeyGirin";
```
**Google Recaptcha**
```php
define('GoogleDogrulamaKey', 'Google RecaptchaKey  Yaz');
define('GoogleDogrulamaSecret', 'Google Recaptcha Secret Yaz');
```
**Site Adı / website name**
```php
$config['siteAdi'] = "website";
```
diğer tüm ayarları nrapp/config/nrsetting.php üzerinden yapabilirsiniz. / all other settings can be done via nrapp /config/nrsetting.php.




## Ekran Görüntüsü / Screen Shot

![ytscript](https://raw.githubusercontent.com/nrucel/youtube-subscriber-tool/master/resimler/Screenshot_1.jpg)

![ytscript](https://raw.githubusercontent.com/nrucel/youtube-subscriber-tool/master/resimler/Screenshot_2.jpg)

![ytscript](https://raw.githubusercontent.com/nrucel/youtube-subscriber-tool/master/resimler/Screenshot_3.jpg)

![ytscript](https://raw.githubusercontent.com/nrucel/youtube-subscriber-tool/master/resimler/Screenshot_4.jpg)

![ytscript](https://raw.githubusercontent.com/nrucel/youtube-subscriber-tool/master/resimler/Screenshot_5.jpg)
