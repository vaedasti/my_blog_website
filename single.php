  <?php
    require_once "php/database.php";
    // Eğer GET yok ise ansayfaya yönlendir
    if (empty(htmlspecialchars($_GET['gonderiId']))) echo "<script>window.location.replace('index.php');</script>";
    include_once "php/header.php";
    $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, g.etiketler,k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 AND g.id=".htmlspecialchars($_GET['gonderiId']);
    $gonderi = sorgu_calistir($sorgu, false);
  ?>
   <!-- Content
   ================================================== -->
   <div id="content-wrap">
   	<div class="row">
   		<div id="main" class="eight columns">
   			<article class="entry">
          <header class="entry-header">
            <h2 class="entry-title"><?php echo $gonderi['baslik']; ?></h2>
            <div class="entry-meta">
              <ul>
                <li><?php echo $gonderi['zaman']; ?></li>
                <span class="meta-sep">&bull;</span>
                <li><?php echo '<a href=index.php?kategoriId='.$gonderi['kategoriId'].' title='.$gonderi['kategori'].' rel=\'category tag\'>'.$gonderi['kategori'].'</a>'; ?></li>
                <span class="meta-sep">&bull;</span>
                <li><?php echo $gonderi['yazar']; ?></li>
              </ul>
            </div>
          </header>
          <!--
					<div class="entry-content-media">
						<div class="post-thumb">
							<img src="images/m-farmerboy.jpg">
						</div>
					</div>-->
					<div class="entry-content">
						<!-- <p class="lead">Lorem ipsum Nisi enim est proident est magna occaecat dolore proident eu</p> -->
            <?php echo $gonderi['icerik']; ?>
					</div>
					<p class="tags">
            <span>Tagged in :</span>
            <?php
              foreach (explode(", " ,$gonderi['etiketler']) as $etiket)
                echo '<a href=index.php?etiket='.$etiket.">".$etiket.'</a>, ';
              $gonderi=null;
            ?>
            <!-- <a href="#">orci</a>, <a href="#">lectus</a>, <a href="#">varius</a>, <a href="#">turpis</a> -->
          </p>
          <ul class="post-nav group">
            <li class="prev">
              <?php
                // Eğer bir önceki yok ise ondan öncekine baksın; SQL ile yap
                //$onceki = sorgu_calistir("SELECT id, baslik FROM gonderiler WHERE gosterim=1 AND id=".(htmlspecialchars($_GET['gonderiId'])-1), false);
                // echo '<a rel="prev" href="single.php?gonderiId='.$onceki['id']."><strong>Önceki Gönderi</strong>baslik</a>";
                // <a rel="prev" href="#"><strong>Önceki Gönderi</strong>baslik</a>
              ?>
            </li>
            <!-- <li class="next"><a rel="next" href="#"><strong>Sonraki Gönderi</strong> Morbi Elit Consequat Ipsum</a></li> -->
          </ul>
				</article>
				<!-- Comments
            ================================================== -->
        <div id="comments">
          <h3>5 Comments</h3>
          <!-- commentlist -->
          <ol class="commentlist">
            <li class="depth-1">
              <div class="avatar">
                <img width="50" height="50" class="avatar" src="images/user-01.png" alt="">
              </div>
              <div class="comment-content">
                <div class="comment-info">
                  <cite>Itachi Uchiha</cite>
                  <div class="comment-meta">
                    <time class="comment-time" datetime="2014-07-12T23:05">Jul 12, 2014 @ 23:05</time>
                    <span class="sep">/</span><a class="reply" href="#">Reply</a>
                  </div>
                </div>
                <div class="comment-text">
                  <p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te inani ponderum vulputate,
                  facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum est, ne has voluptua praesent.</p>
                </div>
              </div>
            </li>
            <li class="thread-alt depth-1">
              <div class="avatar">
                <img width="50" height="50" class="avatar" src="images/user-03.png" alt="">
              </div>
              <div class="comment-content">
                <div class="comment-info">
                  <cite>John Doe</cite>
                  <div class="comment-meta">
                    <time class="comment-time" datetime="2014-07-12T24:05">Jul 12, 2014 @ 24:05</time>
                    <span class="sep">/</span><a class="reply" href="#">Reply</a>
                  </div>
                </div>
                <div class="comment-text">
                  <p>Sumo euismod dissentiunt ne sit, ad eos iudico qualisque adversarium, tota falli et mei. Esse euismod
                  urbanitas ut sed, et duo scaevola pericula splendide. Primis veritus contentiones nec ad, nec et
                  tantas semper delicatissimi.</p>
                </div>
              </div>
              <ul class="children">
                <li class="depth-2">
                  <div class="avatar">
                    <img width="50" height="50" class="avatar" src="images/user-03.png" alt="">
                  </div>
                  <div class="comment-content">
                    <div class="comment-info">
                      <cite>Kakashi Hatake</cite>
                      <div class="comment-meta">
                        <time class="comment-time" datetime="2014-07-12T25:05">Jul 12, 2014 @ 25:05</time>
                        <span class="sep">/</span><a class="reply" href="#">Reply</a>
                      </div>
                    </div>
                    <div class="comment-text">
                      <p>Duis sed odio sit amet nibh vulputate
                      cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit amet nibh vulputate
                      cursus a sit amet mauris</p>
                    </div>
                  </div>
                  <ul class="children">
                    <li class="depth-3">
                      <div class="avatar">
                        <img width="50" height="50" class="avatar" src="images/user-03.png" alt="">
                      </div>
                      <div class="comment-content">
                        <div class="comment-info">
                          <cite>John Doe</cite>
                          <div class="comment-meta">
                            <time class="comment-time" datetime="2014-07-12T25:15">July 12, 2014 @ 25:15</time>
                            <span class="sep">/</span><a class="reply" href="#">Reply</a>
                          </div>
                        </div>
                        <div class="comment-text">
                          <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est
                          etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="depth-1">
              <div class="avatar">
                <img width="50" height="50" class="avatar" src="images/user-02.png" alt="">
              </div>
              <div class="comment-content">
                <div class="comment-info">
                  <cite>Hinata Hyuga</cite>
                  <div class="comment-meta">
                    <time class="comment-time" datetime="2014-07-12T25:15">July 12, 2014 @ 25:15</time>
                    <span class="sep">/</span><a class="reply" href="#">Reply</a>
                  </div>
                </div>
                <div class="comment-text">
                  <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</p>
                </div>
              </div>
            </li>
          </ol> <!-- Commentlist End -->
           <!-- respond -->
          <div class="respond">
            <h3>Leave a Comment</h3>
            <!-- form -->
            <form name="contactForm" id="contactForm" method="post" action="">
              <fieldset>
              <div class="group">
                <label for="cName">Name <span class="required">*</span></label>
                <input name="cName" type="text" id="cName" size="35" value="" />
              </div>
              <div class="group">
                <label for="cEmail">Email <span class="required">*</span></label>
                <input name="cEmail" type="text" id="cEmail" size="35" value="" />
              </div>
              <div class="group">
                <label for="cWebsite">Website</label>
                <input name="cWebsite" type="text" id="cWebsite" size="35" value="" />
              </div>
              <div class="message group">
                <label  for="cMessage">Message <span class="required">*</span></label>
                <textarea name="cMessage"  id="cMessage" rows="10" cols="50" ></textarea>
              </div>
              <button type="submit" class="submit">Submit</button>
              </fieldset>
            </form> <!-- Form End -->
          </div> <!-- Respond End -->
        </div>  <!-- Comments End -->
   		</div> <!-- main End -->
      <?php
        include_once "php/sidebar.php";
        include_once "php/footer.php";
      ?>
