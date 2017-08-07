<?php
  require_once "php/database.php";
  include_once "php/header.php";
?>
<!-- Content
================================================== -->
<div id="content-wrap">
  <div class="row">
    <div id="main" class="eight columns">
      <section class="page">
        <h2 class="entry-title">Hakkımda</h2>
        <?php print sorgu_calistir("SELECT hakkimda FROM website", 1)['hakkimda']; ?>
        <!--<hr />
        <div class="row">
          <form name="contactForm" id="contactForm" method="post" action="#">
            <fieldset>
              <div class="row group">
                <div class="six column left">
                  <label for="cName">İsim <span class="required">*</span></label>
                  <input name="cName" type="text" id="cName" size="35" required />
                </div>
                <div class="six column right">
                  <label for="cEmail">Email <span class="required">*</span></label>
                  <input name="cEmail" type="email" id="cEmail" size="35" required />
                </div>
              </div>
              <div class="message group">
                <label for="cMessage">Mesajınız <span class="required">*</span></label>
                <textarea name="cMessage" id="cMessage" rows="10" cols="50"></textarea>
              </div>
              <button type="submit" class="submit">Gönder</button>
            </fieldset>
          </form>
        </div>-->
      </section> <!-- End page -->
    </div> <!-- End main -->
<?php
  include_once "php/sidebar.php";
  include_once "php/footer.php";
?>
