<div class="sidebar" data-active-color="green" data-background-color="black" data-image="../assets/img/sidebar-3.jpg">
  <!--
  Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

  Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="../../../" class="simple-text">Ana Sayfa</a>
    <!--<a href="http://www.creative-tim.com" class="simple-text">Creative Tim</a>-->
  </div>
  <div class="logo logo-mini">
    <a href="../../../" class="simple-text">Blog</a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li <?php if ($_SERVER['PHP_SELF'] == "/my_blog_website/admin_panel/material-dashboard/main/index.php") print "class='active'"; ?>>
        <a href="index.php"><i class="material-icons">dashboard</i><p>Yönetim Paneli</p></a>
      </li>
      <li <?php if ($_SERVER['PHP_SELF'] == "/my_blog_website/admin_panel/material-dashboard/main/users.php") print "class='active'"; ?>>
        <a href="users.php"><i class="material-icons">account_box</i><p>Kullanıcılar</p></a>
      </li>
      <li>
        <a data-toggle="collapse" href="#posts" class="collapsed" aria-expanded="false">
          <i class="material-icons">library_books</i>
          <p>Gönderiler<b class="caret"></b></p>
        </a>
        <div class="collapse" id="posts" aria-expanded="false" style="height: auto;">
          <ul class="nav">
            <li><a href="posts.php">Gönderiler</a></li>
            <li><a href="postAdd.php">Gönderi Ekle</a></li>
          </ul>
        </div>
      </li>
      <li <?php if ($_SERVER['PHP_SELF'] == "/my_blog_website/admin_panel/material-dashboard/main/comments.php") print "class='active'"; ?>>
        <a href="comments.php"><i class="material-icons">comment</i><p>Yorumlar</p></a>
      </li>
    </ul>
  </div>
</div>
