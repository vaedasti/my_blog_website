    <!-- Footer
    ================================================== -->
    <footer>
      <div class="row">
        <div class="twelve columns">
          <ul class="social-links">
            <?php
              if (! empty($website_bilgileri["site_fb"])){
                echo "<li><a href='https://www.facebook.com/".$website_bilgileri["site_fb"]."'><i class='fa fa-facebook'></i></a></li>";
              }
              if (! empty($website_bilgileri["site_tw"])){
                echo "<li><a href='http://twittter.com/".$website_bilgileri["site_tw"]."'><i class='fa fa-twitter'></i></a></li>";
              }
              if (! empty($website_bilgileri["site_gp"])){
                echo "<li><a href='https://plus.google.com/".$website_bilgileri["site_gp"]."'><i class='fa fa-google-plus'></i></a></li>";
              }
              if (! empty($website_bilgileri["site_git"])){
                echo "<li><a href='https://github.com/".$website_bilgileri["site_git"]."'><i class='fa fa-github-square'></i></a></li>";
              }
              if (! empty($website_bilgileri["site_inst"])){
                echo "<li><a href='https://www.instagram.com/".$website_bilgileri["site_inst"]."'><i class='fa fa-instagram'></i></a></li>";
              }
              if (! empty($website_bilgileri["site_flickr"])){
                echo "<li><a href='https://www.flickr.com/people/".$website_bilgileri["site_flickr"]."'><i class='fa fa-flickr'></i></a></li>";
              }
              if (! empty($website_bilgileri["site_skype"])){
                echo "<li><a href='" . $website_bilgileri["site_skype"]. "'><i class='fa fa-skype'></i></a></li>";
              }
            ?>
          </ul>
        </div>
        <div class="six columns info">
          <h3><?php echo $website_bilgileri["site_basligi"]; ?> hakkında</h3>
          <p><?php echo $website_bilgileri["site_bilgisi"]; ?></p>
        </div>
        <div class="four columns">
          <h3>Photostream</h3>
          <ul class="photostream group">
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
            <li><a href="#"><img alt="thumbnail" src="images/thumb.jpg"></a></li>
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
<?php unset($website_bilgileri); $db=null; unset($gonderiler); unset($kategoriler); unset($etiketler); ?>
