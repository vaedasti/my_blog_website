        <footer class="footer">
          <div class="container-fluid">
            <!--<nav class="pull-left">
              <ul>
                <li><a href="#">Home</a></li>
              </ul>
            </nav>-->
            <p class="copyright pull-right">&copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web</p>
          </div>
        </footer>
      </div>
    </div>
  </body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<!-- <script src="../assets/js/moment.min.js"></script> -->

<!--  Full Calendar Plugin    -->
<!-- <script src="../assets/js/fullcalendar.min.js"></script> -->

<!--  Charts Plugin -->
<!--  <script src="../assets/js/chartist.min.js"></script> -->

<!--  Notifications Plugin    -->
<!--  <script src="../assets/js/bootstrap-notify.js"></script>  -->

<!--  Google Maps Plugin    -->
<!--  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>    -->

<!-- Forms Validations Plugin -->
<script src="../assets/js/jquery.validate.min.js"></script>

<!-- Select Plugin -->
<script src="../assets/js/jquery.select-bootstrap.js"></script>

<!-- TagsInput Plugin -->
<script src="../assets/js/jquery.tagsinput.js"></script>

<!--   Sharrre Library
<script src="../assets/js/jquery.sharrre.js"></script>    -->

<!-- Sliders Plugin
<script src="../assets/js/nouislider.min.js"></script> -->

<!-- Sweet Alert 2 plugin -->
<script src="../assets/js/sweetalert2.js"></script>

<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

<script type="text/javascript">
  function clickMenuItem(item, sira) {
    // A $( document ).ready() block.
    $(item+'>ul>li')[sira].className="active";
    $( document ).ready(function() {
      $(item).parent()[0].children[0].click();//document.getElementById(item).parentNode.childNodes[1].click();
    });
  }
  function clickSomeWhere(item, sira) {
    $( document ).ready(function() {
      $(item)[sira].click();//document.getElementById(item).parentNode.childNodes[1].click();
    });
  }
</script>
<?php
  if ($_SERVER['PHP_SELF'] == "/admin_panel/material-dashboard/main/posts.php")
    print "<script>clickMenuItem('#posts', 0)</script>";
  elseif ($_SERVER['PHP_SELF'] == "/admin_panel/material-dashboard/main/postAdd.php")
    print "<script>clickMenuItem('#posts', 1)</script>";
  elseif ($_SERVER['PHP_SELF'] == "/admin_panel/material-dashboard/main/postAdd.php")
    print "<script>clickMenuItem('#gonderiler', 1)</script>";
?>
</html>
