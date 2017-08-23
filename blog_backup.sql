-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: 172.17.0.1:8080
-- Generation Time: Aug 23, 2017 at 09:51 AM
-- Server version: 5.7.18
-- PHP Version: 7.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_backup`
--

-- --------------------------------------------------------

--
-- Table structure for table `gonderiler`
--

CREATE TABLE `gonderiler` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etiketler` text COLLATE utf8_turkish_ci,
  `yazar` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `gosterim` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `gonderiler`
--

INSERT INTO `gonderiler` (`id`, `baslik`, `icerik`, `zaman`, `etiketler`, `yazar`, `kategori`, `gosterim`) VALUES
(1, 'Staj Günü 1 - 03/07/2017', '<p>&nbsp; HTML&#39;e giriş yaptık. &nbsp;HTML dosyası oluşturduktan sonra ilk satıra &quot;&lt;!DOCTYPE html&gt;&quot; yazarak sisteme bunun HTML dosyası olduğunu tanıtmayı &ouml;ğrendim.</p>\r\n\r\n<p>&nbsp; Ayrı oluşturmuş CSS dosyasını HTML dosyasına aktarmayı &ouml;ğrendim.</p>\r\n\r\n<p>&nbsp; HTML&#39;de kalın yazının &quot;&lt;b&gt;&quot; etiketiyle oluşturulduğunu, italik yazının&nbsp;&quot;&lt;i&gt;&quot; etiketiyle oluşturulduğunu, altı &ccedil;izili yazının&nbsp;&quot;&lt;u&gt;&quot; etiketiyle oluşturulduğunu, linklerin&nbsp;&quot;&lt;a&gt;&quot; etiketiyle olşturulduğunu, başlıkların&nbsp;&quot;&lt;h1&gt;&quot;,&nbsp;&quot;&lt;h2&gt;&quot;,&nbsp;&quot;&lt;h3&gt;&quot;,&nbsp;&quot;&lt;h4&gt;&quot;,&nbsp;&quot;&lt;h5&gt;&quot;,&nbsp;&quot;&lt;h6&gt;&quot; etiketleriyle oluşturulduğunu, tek satırlık boşluğun&nbsp;&quot;&lt;br&gt;&quot; etiketiyle oluşturulduğunu, parağrafın&nbsp;&quot;&lt;p&gt;&quot; etiketiyle oluşturulduğunu &ouml;ğrendim.</p>\r\n\r\n<p>&nbsp; G&uuml;n sonunda JavaScript ile 1&#39;den 100&#39;e kadar olan sayıları tek ve &ccedil;ift diye ayırıp, tek sayıları kendi aralarında, &ccedil;ift sayıları kendi aralında toplayan bir fonksiyon yazmamızı istediler.</p>\r\n\r\n<p><code>function tekCiftTopla() {</code></p>\r\n\r\n<p>&nbsp; tek=0; cift=0;</p>\r\n\r\n<p>&nbsp; for (var i=0; i&lt;100; i++) {</p>\r\n\r\n<p>&nbsp; &nbsp; if((i%2)===0)</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; cift += i;</p>\r\n\r\n<p>&nbsp; &nbsp; else</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; tek += i</p>\r\n\r\n<p>&nbsp; }</p>\r\n\r\n<p>&nbsp; alert(&quot;Tek sayıların toplamı: &quot; + tek);</p>\r\n\r\n<p>&nbsp; alert(&quot;&Ccedil;ift sayıların toplamı: &quot; + cift);</p>\r\n\r\n<p><code>}</code></p>\r\n', '2017-07-19 12:26:51', 'html, javascript', 1, 1, 1),
(2, 'Staj Günü 2 - 04/07/2017', 'HTML\'de sıralı(ol) ve sırasız(ul) listeleri öğrendim.\r\nListe altında liste yapmayı,\r\nListelerin madde işaretlerini ve sıralı listede hangi sıradan başlayacağını değiştirmeyi,\r\nform etiketini ve içerisinde kullanılan label ve input etiketlerini,\r\naşağı açılır liste yapmayı,\r\nform bilgilerinin gönderim yöntemlerini,\r\nforma girilen bilgileri göndermeyi ve temizlemeyi öğrendim. \r\n\r\n  Gün sonunda form örneği gösterdiler ve aynısını yapmamızı istediler.\r\n\r\n<form action=\"#\" method=\"GET\" style=\"width: 350px;\">\r\n <h3>User Input Form</h3>\r\n <fieldset>\r\n  <legend>Personel Particular</legend>\r\n  <label for=\"name\">Name:</label>\r\n  <input type=\"text\" name=\"name\" />\r\n  <br />\r\n  <label for=\"pass\">Password:</label>\r\n  <input type=\"password\" name=\"pass\" />\r\n  <br />\r\n  <label>Gender:</label>\r\n  <input type=\"radio\" name=\"gender\" value=\"m\" />\r\n  <label>Male</label>\r\n  <input type=\"radio\" name=\"gender\" value=\"f\" />\r\n  <label>Female</label>\r\n  <br />\r\n  <label for=\"age\">Age:</label>\r\n  <select name=\"age\">\r\n   <option value=\"+18\">+18</option>\r\n  </select>\r\n </fieldset>\r\n <fieldset>\r\n  <legend>Language</legend>\r\n  <input type=\"checkbox\" name=\"java\" />\r\n  <label for=\"java\">Java</label>\r\n  <input type=\"checkbox\" name=\"c-cpp\" />\r\n  <label for=\"c-cpp\">C/C++</label>\r\n  <input type=\"checkbox\" name=\"csharp\" />\r\n  <label for=\"csharp\">C#</label>\r\n </fieldset>\r\n <fieldset>\r\n  <legend>Instruction</legend>\r\n  <textarea name=\"textarea\" placeholder=\"Enter your instruction here...\" rows=\"7\" cols=\"30\"></textarea>\r\n </fieldset>\r\n <input type=\"submit\" value=\"SEND\" />\r\n <input type=\"reset\" value=\"CLEAR\" />\r\n</form>', '2017-07-20 13:38:11', 'html, form', 1, 1, 1),
(3, 'Staj Günü 3 - 05/07/2017', 'CSS\'e giriş yaptık. CSS\'de etiket seçici, id seçici, class seçici, çocuk seçici ve torun seçicileri öğrendim.\r\nBirden fazla seçici kullanmayı öğrendim.\r\nArkaplan rengini, yazı rengini, yazı boyutunu, yazı tipini, yazı şeklini, yazı hizasını, genişliği, uzunluğu,\r\ndış kenar çizgisini, kenar çizgisini, iç kenar çizgisini, kenar çizgisinin rengini, kenar çizgisinin şeklini,\r\ndeğiştirmeyi ve yorum satırı eklemeyi öğrendim.', '2017-07-20 17:22:06', 'css', 1, 4, 1),
(4, 'Staj Günü 4 - 06/07/2017', '<p>HTML&#39;de &quot;div&quot; etiketinin nasıl kullanıldığını, nasıl hizalandırıldığını, sabitlemeyi, &ouml;ne ve arkaya almayı &ouml;ğrendim.</p>\r\n', '2017-07-20 17:23:19', 'div', 1, 1, 1),
(5, 'Staj Günü 5 - 07/07/2017', 'apple.com.tr websitesinin bir benzerini yapmaya çalıştık.', '2017-07-20 17:24:00', 'html, css', 1, 4, 1),
(6, 'Staj Günü 6 - 10/07/2017', '<p>&nbsp; PHP&#39;ye giriş yaptık. Değişken ve sabit tanımlamayı &ouml;ğrendim. Unset, isset, empty, var_dump, define komutlarını &ouml;ğrendim. &quot;echo&quot; komutunun sayfaya yazı yazdırdığını &ouml;ğrendim. Sayfaya yazı yazdırırken iki metni birbirine bağlamayı &ouml;ğrendim. If-else yapısı oluşturmayı &ouml;ğrendim. Form&#39;dan &#39;GET&#39; ile gelen veriye ulaşmayı &ouml;ğrendim.</p>\r\n\r\n<p>&nbsp; Bu &ouml;ğrendiklerimiz ile bizden kullanıcı girişi yapmamızı istediler.</p>\r\n\r\n<p><code>&lt;form action=&quot;#&quot; method=&quot;get&quot;&gt;<br />\r\n&nbsp; &lt;label for=&quot;kAd&quot;&gt;Kullanıcı adı&lt;/label&gt;<br />\r\n&nbsp; &lt;input type=&quot;text&quot; id=&quot;kAd&quot; name=&quot;kAd&quot; /&gt;<br />\r\n&nbsp; &lt;label for=&quot;sifre&quot;&gt;Parola&lt;/label&gt;<br />\r\n&nbsp; &lt;input type=&quot;password&quot; id=&quot;sifre&quot; name=&quot;sifre&quot; /&gt;<br />\r\n&nbsp; &lt;input type=&quot;submit&quot; value=&quot;Giriş Yap&quot; /&gt;<br />\r\n&lt;/form&gt;<br />\r\n&lt;?php<br />\r\n&nbsp; $kAd=&quot;admin&quot;; $sifre=&quot;1234&quot;; $ad=&quot;Y&ouml;netici Adı&quot;; $soyad=&quot;Y&ouml;netici Soyadı&quot;;<br />\r\n&nbsp; if(!empty($_GET[&#39;kAd&#39;]) AND !empty($_GET[&#39;sifre&#39;])) {<br />\r\n&nbsp; &nbsp; if(isset($kAd) AND isset($sifre)) {<br />\r\n&nbsp; &nbsp; &nbsp; if($kAd == $_GET[&#39;kAd&#39;] AND $sifre == $_GET[&#39;sifre&#39;]) {<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; echo &quot;&lt;script&gt;document.getElementsByTagName(&#39;form&#39;)[0].style=&#39;display: none&#39;;&lt;/script&gt;&quot;;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; echo &quot;&lt;h3&gt;Hoşgeldiniz $ad $soyad&lt;/h3&gt;&quot;;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; echo &quot;&lt;a href=&#39;/anasayfa.php&#39;&gt;&Ccedil;ıkış Yap&lt;/a&gt;&quot;<br />\r\n&nbsp; &nbsp; &nbsp; } else {<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; echo &quot;&lt;p&gt;Kullanıcı adı veya şifre yanlış.&lt;/a&gt;&quot;;<br />\r\n&nbsp; &nbsp; &nbsp; }<br />\r\n&nbsp; &nbsp; } else {<br />\r\n&nbsp; &nbsp; &nbsp; echo &quot;&lt;p&gt;Kullanıcı adı ve şifre değişkeni bulunamadı.&lt;/p&gt;&quot;;<br />\r\n&nbsp; &nbsp; }<br />\r\n&nbsp; }<br />\r\n?&gt; </code></p>\r\n', '2017-07-20 17:25:23', 'php, html, form', 1, 2, 1),
(7, 'Staj Günü 7 - 11/07/2017', '  PHP ile session kullanarak kullanıcı kaydı ve girişi yaptık.\r\n\r\n  Dizilere giriş yaptık. Dizi tanımlama şekillerini öğrendim.\r\nDizi elemanlarını for ve foreach ile tek tek ekrana yazdırmayı öğrendim.\r\n\r\n  Switch Case yapısını öğrendim.\r\n\r\n  htmlspecialchars komutu ile gelen veri içerisinde HTML etiketleri var ise bunları aktif olmayacak şekilde veriyi almayı öğrendim.', '2017-07-20 17:26:11', 'php, session', 1, 2, 1),
(8, 'Staj Günü 8 - 12/07/2017', '<p>PHP\'de fonksiyonları öğrendim. Geri değer gönderen fonksiyon, parametreli fonksiyonları öğrendim. PHP ile sunucuya dosya yükleme işlemlerini öğrendim.</p>\r\n<p>For, foreach, while d&ouml;ng&uuml;lerini &ouml;ğrendim.</p>\r\n', '2017-07-20 17:27:11', 'php, fonksiyonlar, dosya, yükleme, dosya yükleme, döngü, döngüler, for, foreach, while', 1, 2, 1),
(9, 'Staj Günü 9 - 13/07/2017', '<p>PHP\'de veritabanı bağlantısı yaptık. Veritabanı sorgusu ile veritabanından veri çekmeyi öğrendim. Veritabanından verileri sırası ile çekip satır halinde ekrana yazdırmayı öğrendim.</p>\r\n', '2017-07-20 17:27:45', 'php, veritabanı, veri', 1, 2, 1),
(10, 'Staj Günü 10 - 14/07/2017', '<p>GitHub&#39;ın ne işe yaradığını ve nasıl kullanılıcağını &ouml;ğrendim.</p>\r\n', '2017-07-20 17:28:08', 'GitHub', 1, 1, 1),
(11, 'Staj Günü 11 - 17/07/2017', '<p>PHP ile karakter işlemlerini &ouml;ğrendim. mb_strtoupper, mb_strtolower, mb_convert_case, ucfirst, trim, explode komutlarını &ouml;ğrendim.</p>\r\n\r\n<p>Statik bir blog sitesi şablonunu dinamik hale getirmemizi istediler. Statik bir blog sitesi şablonu bulduk ve yavaş yavaş dinamik hale getirmeye başladık.</p>\r\n', '2017-07-20 17:28:48', 'php, statik, dinamik, blog, site, website', 1, 2, 1),
(12, 'Staj Günü 12 - 18/07/2017', '<p>Websitesinde kullanmak &uuml;zere veritabanı hazırladık. Blog yazısı, tarihi, başlığı, yazarı gibi bilgileri vertabanından &ccedil;ekip şablon &uuml;zerine yerleştirmeye başladık.</p>\r\n', '2017-07-31 18:57:57', 'veritabanı', 1, 4, 1),
(13, 'Staj Günü 13 - 19/07/2017', '<p>Blog da kullanmak &uuml;zere giriş sayfası şablonu bulduk.</p>\r\n\r\n<p>Kullanıcının girmiş olduğu kullanıcı adı ve şifreyi veritabanından sorgulatıp eğer veri gelirse gelen bilgileri session&#39;a kaydedip anasayfaya y&ouml;nlendiriyoruz. Eğer veri gelmezse &quot;Girdiiniz bilgileri kontrol ediniz.&quot; diye mesaj veriyoruz.</p>\r\n', '2017-07-31 18:59:35', 'giriş, sayfası', 1, 2, 1),
(14, 'Staj Günü 14 - 20/07/2017', '<p>Blog da kullanmak &uuml;zere kayıt sayfası şablonu bulduk.</p>\r\n\r\n<p>Kullanıcının girmiş olduğu kullanıcı adı ve email zaten veritabanında kayıtlıysa &quot;Bu e-mail veya kullanıcı adı zaten var.&quot; diye uyarı veriyoruz. Eğer bu bilgiler veritabanında yok ise girdiği verileri veritabanında kaydedip session ekleyerek kullanıcının hem kayıt olmasını hemde giriş yapmasını sağlıyoruz.&nbsp;</p>\r\n', '2017-07-31 19:50:54', 'kayıt', 1, 2, 1),
(15, 'Staj Günü 15 - 21/07/2017', '<p>Blog sitesi i&ccedil;in yorum alanını işlevsel hale getirdik.</p>\r\n\r\n<p>Varsayılan olarak yazılan yorum yayınlanmıyor. Y&ouml;netici onay verdikten sonra yayına alınacak şekilde veritabanı ve yorum alanını yaptık.</p>\r\n\r\n<p>Y&ouml;netici onaylayabilmek i&ccedil;in giriş yapıp y&ouml;netim panelini a&ccedil;malı ve oradan onay vermeli. Y&ouml;netim panelini yaparken buna dikkat ederek yapıcaz.</p>\r\n', '2017-07-31 20:17:43', 'yorum', 1, 2, 1),
(16, 'Staj Günü 16 - 24/07/2017', '<p>Anasayfadan bir g&ouml;nderiye tıklandığı zaman bu g&ouml;nderiyi başka bir sayfada a&ccedil;ıp g&ouml;nderinin tamamını g&ouml;sterdik. Altna da yorumlar b&ouml;l&uuml;m&uuml; ekledik. Yorum yazabilme alanı da yaptık.</p>\r\n\r\n<p>Yapılan yorumları g&ouml;nderi iler eşleştirdik bu sayede yorumlar karışmıyor.</p>\r\n', '2017-07-31 20:25:43', 'gönderi', 1, 2, 1),
(17, 'Staj Günü 17 - 25/07/2017', '<p>Sidebar&#39;a kategoriler tablosunu &ccedil;ektik. Kategoriye ait hi&ccedil;bir g&ouml;nderi yoksa g&ouml;z&uuml;km&uuml;yor ve en fazla g&ouml;nderiye sahip olandan aza doğru sıralıyor.</p>\r\n\r\n<p>Kategori isminin yazdığı yere ayrıca o kategoriye ait ka&ccedil; tane g&ouml;nderi olduğunu yazdırdık.</p>\r\n', '2017-08-09 15:51:25', 'kategoriler', 1, 2, 1),
(18, 'Staj Günü 18 - 26/07/2017', '<p>Blog i&ccedil;in y&ouml;netim paneli şablonu bulduk. Bu şablonu websitenin dosyaları arasına ekledik. Y&ouml;netici giriş yaptığı zaman doğrudan y&ouml;netim paneli a&ccedil;ılacak şekilde ayarladık. Y&ouml;netici olmayan ve giriş yapılmamışsa y&ouml;netim paneline erişilemeyecek şekilde ayarladık.</p>\r\n', '2017-08-09 18:37:06', 'yönetim, panel', 1, 2, 1),
(19, 'Staj Günü 19 - 27/07/2017', '<p>Y&ouml;netim paneline g&ouml;nderiler tablosunu &ccedil;ektik. G&ouml;nderi ekleme, silme, onaylama işlemlerini yaptık. G&ouml;nderiyi eklerken yazar kısmını session&#39;dan &ccedil;ektik.</p>\r\n\r\n<p>Kategori ekleme, d&uuml;zenleme ve silme işlemlerini yaptık. G&ouml;nderi eklerken kategori se&ccedil;imi de yapabilsin diye ayarladık. G&ouml;nderi eklerken etiket eklemeyi yaptık.</p>\r\n', '2017-08-09 18:44:57', 'gönderi, yönetim, panel', 1, 2, 1),
(20, 'Staj Günü 20 - 28/07/2017', '<p>Y&ouml;netim paneline kullanıcılar b&ouml;l&uuml;m&uuml; ekledik. Buradan kayıtlı t&uuml;m kullanıcıları y&ouml;netici g&ouml;rebiliyor. Aynı zamanda herhangi bir kullanıcıyı da y&ouml;netici yapabiliyor. Y&ouml;netici olan kullanıcı silinemeyecek şekilde ayarladık ama y&ouml;netici olmayan kullanıcıları silebilecek. Başka bir y&ouml;neticiyi y&ouml;neticilikten &ccedil;ıkaramayacak şekilde ayarladık.</p>\r\n', '2017-08-09 18:53:06', 'kullanıcılar, yönetim, panel', 1, 2, 1),
(21, 'Staj Günü 21 - 31/07/2017', '<p>Y&ouml;netim paneline yorumlar kısmını ekledik. Onaylı yorumların onayını kaldırma, onaysız yorumları onaylama ekledik. Yorumu silme ekledik. Yoruma yazılan HTML etiketlerini ge&ccedil;ersiz yaptık.</p>\r\n', '2017-08-09 19:15:07', 'yorumlar, onay, onaysız, sil', 1, 2, 1),
(22, 'Staj Günü 22 - 01/08/2017', '<p>Y&ouml;netim paneline websitenin men&uuml;lerini değiştirebilmek i&ccedil;in yer yaptık. Buradan men&uuml; ismini ve adresini y&ouml;netici değiştirebiliyor. Men&uuml; ekleyebiliyor. Varolan men&uuml;y&uuml; silebiliyor.</p>\r\n', '2017-08-09 19:31:50', 'menü, yönetim, paneli', 1, 2, 1),
(23, 'Staj Günü 23 - 02/08/2017', '<p>Y&ouml;netim paneline website bilgilerini i&ccedil;eren bir yer ekledik. Buradan websitenin adı, sahibi, hakkımda sayfasının yazısı, sosyal medya linkleri ve site alt başlığını değiştirebiliyoruz.&nbsp;</p>\r\n', '2017-08-09 19:37:45', 'website, yönetim, panel', 1, 2, 1),
(24, 'Staj Günü 24 - 03/08/2017', '<p>Websitesine arama b&ouml;l&uuml;m&uuml; ekledik. Sidebar da yorum sayısına g&ouml;re pop&uuml;ler g&ouml;nderileri sıraladık.</p>\r\n', '2017-08-09 19:53:15', 'ara, sidebar', 1, 2, 1),
(25, 'Staj Günü 25 - 04/08/2017', '<p>$_GLOBALS - K&uuml;resel&nbsp;değişkenler.<br />\r\n$_SESSION - Oturum. Websiteside kullanmak amacıyla&nbsp;tarayıcıda veri tutmaya yarar.<br />\r\n$_GET &amp; $_POST - Veri g&ouml;nderme-alma t&uuml;rleri.<br />\r\n$_SERVER - başlıklar, yollar ve betiklerin yerleri gibi bilgileri i&ccedil;eren bir dizidir.&nbsp;<br />\r\n$_FILES - Dosya y&uuml;klemek i&ccedil;in kullanılır.<br />\r\n$_COOKIE - &Ccedil;erezler. Tarayıcıda veri tutar.</p>\r\n', '2017-08-09 20:34:07', 'değişkenler', 1, 2, 1),
(26, 'Staj Günü 26 - 07/08/2017', '<p>PDO::exec() - Belirtilen SQL deyimini &ccedil;alıştırır ve etkilenen satır sayısını d&ouml;nd&uuml;r&uuml;r.</p>\r\n\r\n<p>PDO::query() - Bir SQL deyimini &ccedil;alıştırıp sonucu bir PDOStatement nesnesi olarak d&ouml;nd&uuml;r.</p>\r\n\r\n<p>PDO::prepare() - &Ccedil;alıştırılmak &uuml;zere bir deyimi hazırlar ve bir deyim nesnesi olarak d&ouml;nd&uuml;r&uuml;r.</p>\r\n\r\n<p>PDO::execute() - Bir hazır deyimi &ccedil;alıştırır.</p>\r\n\r\n<p>strip_tags() - Parametre olarak verilen string&#39;i HTML ve PHP etiketlerinden ayıklar.</p>\r\n', '2017-08-09 20:35:13', 'PDO, exec, query, prepare, execute, strip_tags', 1, 2, 1),
(27, 'Staj Günü 27 - 08/08/2017', '<h3>SQL Injection</h3>\r\n\r\n<p>Web uygulamalarındaki en b&uuml;y&uuml;k a&ccedil;ıkların başında gelir. Uygulamada yazılan SQL c&uuml;mlesine dışarıdan girilen değerler ile m&uuml;dahale edilmesiyle oluşur.</p>\r\n\r\n<p>&Ouml;rnek; SQL c&uuml;mlesi:</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">SELECT * FROM kullanicilar WHERE adi=&quot;&quot;</div>\r\n\r\n<p>Girilen değer:</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">&quot; OR &quot;&quot;=&quot;&quot;</div>\r\n\r\n<p>Sonu&ccedil;:</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">SELECT * FROM kullanicilar WHERE adi=&quot;&quot; OR &quot;&quot;=&quot;&quot;&quot;.</div>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>XSS</h3>\r\n\r\n<p>Genellikle web uygulamalarında bulunan bir a&ccedil;ıktır. HTML kodları arasına istemci tabanlı &ccedil;alışan kod g&ouml;m&uuml;lmesi yoluyla kullanıcının tarayıcısında istenen istemci tabanlı kodun &ccedil;alıştırılabilmesi olarak tanımlanır.</p>\r\n\r\n<h3>CSRF</h3>\r\n\r\n<p>Siteler arası istek sahteciliği. Bir siteden başka bir siteye yapılan &#39;GET&#39; veya &#39;POST&#39; isteği ile o sayfada işlem yapılmasına olanak sağlar.</p>\r\n', '2017-08-09 20:35:47', 'csrf, xss, sql, injection', 1, 2, 1),
(28, 'Staj Günü 28 - 09/08/2017', '<p>Cookie tanımlama:</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">setcookie(&quot;&ccedil;erez&quot;, &#39;bilgi&#39;);</div>\r\n\r\n<p>Zaman sınırlı cookie tanımlama:</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">setcookie(&quot;&ccedil;erez&quot;, &quot;bilgi&quot;, time() + (60*60*24)); // 24 saat</div>\r\n\r\n<p>Cookie silme:</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">setcookie(&quot;&ccedil;ereze&quot;, &quot;bilgi&quot;, time() - 3600);</div>\r\n', '2017-08-09 20:37:50', 'cookie', 1, 2, 1),
(29, 'Staj Günü 29 - 10/08/2017', '<p>Yapdığımız websitemizi test ettik. Varolan site a&ccedil;ıklarını kapatmaya &ccedil;alıştık. Hatalarımızı gidermeye &ccedil;alıştık.</p>\r\n', '2017-08-09 20:38:08', 'site, açık, test', 1, 2, 1),
(30, 'Staj Günü 30 - 11/08/2017', '<p>Yaptığımız websitesimizi herşeyiyle test ettik. Eksik veya &ccedil;alışmayan yerleri varsa d&uuml;zeltmeye &ccedil;alıştık.</p>\r\n', '2017-08-09 20:38:21', 'test, eksik, düzeltmek', 1, 2, 1),
(31, 'sdsd', '<p>asdasda</p>\r\n', '2017-08-12 19:03:35', 'fdsf,fds fds', 1, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `ad`) VALUES
(5, 'Ajax'),
(4, 'CSS'),
(1, 'HTML'),
(3, 'JavaScript'),
(6, 'JQuery'),
(7, 'NodeJS'),
(2, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `kAd` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `parola` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kTarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tip` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kAd`, `parola`, `email`, `ad`, `soyad`, `kTarih`, `tip`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@admin.com', 'Administrator', NULL, '2017-07-19 14:31:14', 1),
(2, 'vaedasti', '81dc9bdb52d04dc20036dbd8313ed055', 'vaedasti@gmail.com', 'Velat', 'Vurgun', '2017-07-21 18:35:45', 0),
(3, 'asdas', 'asdasd', 'asda@asd.com', 'Das', 'Dasd', '2017-08-12 18:36:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adresi` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `adi`, `adresi`) VALUES
(1, 'Ana Sayfa', '/index.php'),
(4, 'Arşiv', '/archives.php'),
(5, 'Hakkımda', '/page.php');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `site_basligi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_slogani` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_bilgisi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_fb` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_tw` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_gp` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_git` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_inst` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_flickr` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_skype` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `hakkimda` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `site_basligi`, `site_slogani`, `site_bilgisi`, `site_fb`, `site_tw`, `site_gp`, `site_git`, `site_inst`, `site_flickr`, `site_skype`, `hakkimda`) VALUES
(1, 'ATA-BAUM Staj Blogu', 'Velat Vurğun', 'Bu websitesi Velat VURĞUN\'un ATA-BAUM\'da yaptığı staj için açtığı bir blog sitesidir.', 'velatvurgun', 'vaedasti', '111168849930276250193', 'vaedasti', '', '', '', '<p>&nbsp; Atat&uuml;rk &Uuml;niversitesi Tortum Meslek Y&uuml;ksekokulu&#39;nda okudum. Bilgisayar Bilimleri Araştırma ve Uygulama Merkezi(BAUM)&#39;da staj yapmaktayım.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `kullanici` int(11) NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gonderi` int(11) NOT NULL,
  `onay` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `kullanici`, `icerik`, `tarih`, `gonderi`, `onay`) VALUES
(1, 2, 'test-deneme', '2017-07-26 10:47:56', 11, 1),
(5, 1, 'Yorum', '2017-07-31 08:52:58', 11, 1),
(9, 1, '&lt;h1&gt;başlık&lt;/h1&gt;', '2017-08-09 19:12:38', 19, 1),
(10, 3, 'vfvsdvs', '2017-08-12 18:37:22', 30, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gonderiler`
--
ALTER TABLE `gonderiler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `kategori` (`kategori`),
  ADD KEY `yazar` (`yazar`);

--
-- Indexes for table `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ad` (`ad`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kAd` (`kAd`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gonderi` (`gonderi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gonderiler`
--
ALTER TABLE `gonderiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gonderiler`
--
ALTER TABLE `gonderiler`
  ADD CONSTRAINT `gonderiler_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategoriler` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `gonderiler_ibfk_2` FOREIGN KEY (`yazar`) REFERENCES `kullanicilar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD CONSTRAINT `yorumlar_ibfk_1` FOREIGN KEY (`gonderi`) REFERENCES `gonderiler` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
