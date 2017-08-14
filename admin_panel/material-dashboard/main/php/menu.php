  <nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
      <div class="navbar-minimize">
        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
          <i class="material-icons visible-on-sidebar-regular">more_vert</i>
          <i class="material-icons visible-on-sidebar-mini">view_list</i>
          <div class="ripple-container"></div>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="material-icons">person</i>
              <p class="hidden-lg hidden-md">Profile</p>
              <?php print "<span>".$_SESSION['ad']." ".$_SESSION['soyad']."</span>"; ?>
            </a>
            <ul class="dropdown-menu">
              <li><a href="../../../index.php?cikis=true">Çıkış</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
