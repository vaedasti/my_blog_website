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
      </section> <!-- End page -->
    </div> <!-- End main -->
<?php
  include_once "php/sidebar.php";
  include_once "php/footer.php";
?>
