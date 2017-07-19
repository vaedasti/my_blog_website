<!-- Content
================================================== -->
<div id="content-wrap">
  <div class="row">
    <div id="main" class="eight columns">
      <article class="entry">
        <header class="entry-header">
          <h2 class="entry-title">
            <a href="single.html" title="Gönderi başlığı">Hey, We Love Open Sans!</a>
          </h2>
          <div class="entry-meta">
            <ul>
              <li>July 12, 2014</li>
              <span class="meta-sep">&bull;</span>
              <li><a href="#" title="" rel="category tag">Ghost</a></li>
              <span class="meta-sep">&bull;</span>
              <li>John Doe</li>
            </ul>
          </div>
        </header>
        <div class="entry-content">
          <p>Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non laborum adipisicing aliqua ea nisi sint ut quis proident ullamco ut dolore culpa occaecat ut laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.</p>
        </div>
      </article> <!-- end entry -->
    </div> <!-- end main -->
    <div id="sidebar" class="four columns">
      <div class="widget widget_search">
        <h3>Ara</h3>
        <form action="#">
          <input type="text" value="Ara..." onblur="if(this.value == '') { this.value = 'Ara...'; }" onfocus="if (this.value == 'Ara...') { this.value = ''; }" class="text-search">
          <input type="submit" value="" class="submit-search">
        </form>
      </div>
      <div class="widget widget_categories group">
          <h3>Kategoriler</h3>
        <ul>
          <?php for ($i=1; $i <= 5; $i++) { ?>
              <li><?php echo "<a href='single.php?kategori=$i' title='Kategori $i'> Kategori $i" . "</a> (#count)"; ?></li>
          <?php } ?>
        </ul>
      </div>
      <!--<div class="widget widget_text group">
        <h3>Widget Text.</h3>
        <p>Lorem ipsum Ullamco commodo laboris sit dolore commodo aliquip incididunt fugiat esse dolor aute fugiat minim eiusmod do velit labore fugiat officia ad sit culpa labore in consectetur sint cillum sint consectetur voluptate adipisicing Duis irure magna ut sit amet reprehenderit.</p>
      </div>-->
      <div class="widget widget_tags">
        <h3>Etiketler</h3>
        <div class="tagcloud group">
          <a href="#">Corporate</a>
          <a href="#">Onepage</a>
          <a href="#">Agency</a>
          <a href="#">Multipurpose</a>
          <a href="#">Blog</a>
          <a href="#">Landing Page</a>
          <a href="#">Resume</a>
        </div>
      </div>
      <!--<div class="widget widget_popular">
        <h3>Popular Post.</h3>
        <ul class="link-list">
          <li><a href="#">Sint cillum consectetur voluptate.</a></li>
          <li><a href="#">Lorem ipsum Ullamco commodo.</a></li>
          <li><a href="#">Fugiat minim eiusmod do.</a></li>
        </ul>
      </div>-->
    </div> <!-- end sidebar -->
  </div> <!-- end row -->
</div> <!-- end content-wrap -->
