    <!-- Footer
    ================================================== -->
    <footer>
      <div class="row">
        <div class="twelve columns">
          <ul class="social-links">
            <?php
              if (!empty($website_bilgileri["site_fb"])) // Eğer Facebook bilgisi var ise
                print "<li><a target='_blank' href='https://www.facebook.com/".$website_bilgileri['site_fb']."'><i class='fa fa-facebook'></i></a></li>";
              if (!empty($website_bilgileri["site_tw"])) // Eğer Twitter bilgisi var ise
                print "<li><a target='_blank' href='http://twittter.com/".$website_bilgileri['site_tw']."'><i class='fa fa-twitter'></i></a></li>";
              if (!empty($website_bilgileri["site_gp"])) // Eğer Google Plus bilgisi var ise
                print "<li><a target='_blank' href='https://plus.google.com/".$website_bilgileri['site_gp']."'><i class='fa fa-google-plus'></i></a></li>";
              if (!empty($website_bilgileri["site_git"])) // Eğer GitHub bilgisi var ise
                print "<li><a target='_blank' href='https://github.com/".$website_bilgileri['site_git']."'><i class='fa fa-github-square'></i></a></li>";
              if (!empty($website_bilgileri["site_inst"])) // Eğer instagram bilgisi var ise
                print "<li><a target='_blank' href='https://www.instagram.com/".$website_bilgileri['site_inst']."'><i class='fa fa-instagram'></i></a></li>";
              if (!empty($website_bilgileri["site_flickr"])) // Eğer Flickr bilgisi var ise
                print "<li><a target='_blank' href='https://www.flickr.com/people/".$website_bilgileri['site_flickr']."'><i class='fa fa-flickr'></i></a></li>";
              if (!empty($website_bilgileri["site_skype"])) // Eğer Skype bilgisi var ise
                print "<li><a target='_blank' href='".$website_bilgileri['site_skype']."'><i class='fa fa-skype'></i></a></li>";
            ?>
          </ul>
        </div>
        <div class="six columns info">
          <h3><?php print $website_bilgileri['site_basligi']; ?> hakkında</h3>
          <p><?php print $website_bilgileri['site_bilgisi']; ?></p>
        </div>
        <div class="four columns">
          <h3>Fotoğraf Akışı</h3>
          <ul class="photostream group">
            <?php
              //foreach (inst_resim() as $resimler)
              //  print "<li><a href=".$resimler['link']."><img alt='thumbnail' src=".$resimler['resim']."></a></li>";
            ?>
          </ul>
        </div>
        <div class="two columns">
          <h3 class="social">Site haritası</h3>
          <ul class="navigate group">
            <?php $menuler = sorgu_calistir("SELECT * FROM menu ORDER BY id",2); foreach ($menuler as $menu) { ?>
              <li><a href='<?php print $menu['adresi']; ?>'><?php print $menu['adi']; ?></a></li>
            <?php } ?>
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
