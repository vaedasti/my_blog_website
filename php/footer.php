    <!-- Footer
    ================================================== -->
    <footer>
      <div class="row">
        <div class="twelve columns">
          <ul class="social-links">
            <?php
              if (! empty($website_bilgileri["site_fb"])) // Eğer Facebook bilgisi var ise
                print "<li><a href='https://www.facebook.com/".$website_bilgileri["site_fb"]."'><i class='fa fa-facebook'></i></a></li>";
              if (! empty($website_bilgileri["site_tw"])) // Eğer Twitter bilgisi var ise
                print "<li><a href='http://twittter.com/".$website_bilgileri["site_tw"]."'><i class='fa fa-twitter'></i></a></li>";
              if (! empty($website_bilgileri["site_gp"])) // Eğer Google Plus bilgisi var ise
                print "<li><a href='https://plus.google.com/".$website_bilgileri["site_gp"]."'><i class='fa fa-google-plus'></i></a></li>";
              if (! empty($website_bilgileri["site_git"])) // Eğer GitHub bilgisi var ise
                print "<li><a href='https://github.com/".$website_bilgileri["site_git"]."'><i class='fa fa-github-square'></i></a></li>";
              if (! empty($website_bilgileri["site_inst"])) // Eğer instagram bilgisi var ise
                print "<li><a href='https://www.instagram.com/".$website_bilgileri["site_inst"]."'><i class='fa fa-instagram'></i></a></li>";
              if (! empty($website_bilgileri["site_flickr"])) // Eğer Flickr bilgisi var ise
                print "<li><a href='https://www.flickr.com/people/".$website_bilgileri["site_flickr"]."'><i class='fa fa-flickr'></i></a></li>";
              if (! empty($website_bilgileri["site_skype"])) // Eğer Skype bilgisi var ise
                print "<li><a href='" . $website_bilgileri["site_skype"]. "'><i class='fa fa-skype'></i></a></li>";
            ?>
          </ul>
        </div>
        <div class="six columns info">
          <h3><?php print $website_bilgileri["site_basligi"]; ?> hakkında</h3>
          <p><?php print $website_bilgileri["site_bilgisi"]; ?></p>
        </div>
        <div class="four columns">
          <h3>Fotoğraf Akışı</h3>
          <ul class="photostream group">
            <?php
              $username = "natgeo";
              $json = file_get_contents('https://www.instagram.com/'.$username.'/media/');
              $instagram_feed_data = json_decode($json, true);
              $post = $instagram_feed_data['items'];
              if (isset($post)) {
                for ($i=0; $i < 8; $i++) {
                  $link = $post[$i]['link'];
                  $img_url = $post[$i]['images']['low_resolution']['url'];
                  //$caption = isset($post[$i]['caption']) ? $post[$i]['caption']['text'] : '';
                  print "<li><a href=".$link."><img alt='thumbnail' src=".$img_url."></a></li>";
                }
              }
            ?>
            <!--<li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>-->
          </ul>
        </div>
        <div class="two columns">
          <h3 class="social">Navigate</h3>
          <ul class="navigate group">
            <li><a href="index.php">Ana Sayfa</a></li>
            <li><a href="archives.php">Arşiv</a></li>
            <li><a href"page.php">Hakkımda</a></li>
          </ul>
        </div>
        <p class="copyright">&copy; Copyright 2014 Keep It Simple. &nbsp; Design by <a title="Styleshout" href="http://www.styleshout.com/">Styleshout</a>.</p>
      </div> <!-- End row -->
      <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#top"><i class="fa fa-chevron-up"></i></a></div>
    </footer> <!-- End Footer-->
    <!-- Java Script
    ================================================== -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<?php unset($website_bilgileri); $db=null; unset($gonderiler); unset($kategoriler); unset($etiketler); // Değişkenleri sıfırla ?>
