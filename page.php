<?php
  require_once "php/database.php";
  include_once "php/header.php";
?>
<?php
  //if "email" variable is filled out, send email
  if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['cEmail']))  {
    //Email information
    $recipient = "vaedasti@gmail.com";
    $name = strip_tags(trim($_POST["cName"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = trim($_POST["cEmail"]);
    $subject = "New contact from $name";
    $message = trim($_POST["cMessage"]);

    //send email
    print_r(mail($recipient, "subject", "message"));//"$subject", $message, "From:" . $email);
  }
?>
<!-- Content
================================================== -->
<div id="content-wrap">
  <div class="row">
    <div id="main" class="eight columns">
      <section class="page">
        <h2 class="entry-title">Hakkımda</h2>
        <?php print sorgu_calistir("SELECT hakkimda FROM website", 1)['hakkimda']; ?>
        <hr />
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
              <!--<div class="group">
                <label for="cWebsite">Website</label>
                <input name="cWebsite" type="text" id="cWebsite" size="35" value="" />
              </div>
              <div class="group">
                <label for="cEmail">Email <span class="required">*</span></label>
                <input name="cEmail" type="text" id="cEmail" size="35" value="" />
              </div>-->
              <div class="message group">
                <label for="cMessage">Mesajınız <span class="required">*</span></label>
                <textarea name="cMessage" id="cMessage" rows="10" cols="50"></textarea>
              </div>
              <button type="submit" class="submit">Gönder</button>
            </fieldset>
          </form>
        </div>
        <!--<p class="lead">Lorem ipsum Nisi enim est proident est magna occaecat dolore proident eu ex sunt consectetur consectetur dolore enim nisi exercitation adipisicing magna culpa commodo deserunt ut do Ut occaecat. Lorem ipsum Veniam consequat quis aliquip dolore minim ex labore dolor Excepteur Duis velit in officia Excepteur officia officia officia cillum ut elit in fugiat incididunt ea ad Ut ut ea ea dolor ex dolor eu magna voluptate irure consectetur.</p>
        <p>Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non laborum adipisicing aliqua ea nisi sint ut quis proident ullamco ut dolore culpa occaecat ut laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.</p>
        <p>Lorem ipsum Nisi enim est proident est magna occaecat dolore proident eu ex sunt consectetur consectetur dolore enim nisi exercitation adipisicing magna culpa commodo deserunt ut do Ut occaecat. Lorem ipsum Veniam consequat quis aliquip dolore minim ex labore dolor Excepteur Duis velit in officia Excepteur officia officia officia cillum ut elit in fugiat incididunt ea ad Ut ut ea ea dolor ex dolor eu magna voluptate irure consectetur.</p>
        <div class="row">
          <div class="six columns left">
            <h5>Our Process.</h5>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
          </div>
          <div class="six columns right">
            <h5>Our Approach.</h5>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
          </div>
        </div>
        <div class="row">
          <div class="six columns left">
            <h5>Our Goal.</h5>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
          </div>
          <div class="six columns right">
            <h5>Our Mission.</h5>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
          </div>
        </div>-->
      </section> <!-- End page -->
    </div> <!-- End main -->
<?php
  include_once "php/sidebar.php";
  include_once "php/footer.php";
?>
