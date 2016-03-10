      <footer class="padded">
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
              <a href="<?php echo site_url()."/".((pll_current_language() != "pt") ? pll_current_language() : ""); ?>" class="link-logo"><img src="<?php echo get_template_directory_uri() . "/bootstrap/css/images/logo.svg"?>" width="98" border="0"></a>

              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("widgetized-language") ) : ?>
              <?php endif; ?>
            </div>
            <div class="col-sm-9">
              <div class="menu-footer">
                <div class="row">
                  <div class="col-sm-4">
                    <h3>AppCívico</h3>
                    <?php wp_nav_menu( array('menu' => 'Footer_AppCivico_'.pll_current_language() )); ?>
                  </div>
                  <div class="col-sm-4">
                    <h3><?php echo tl("Desenvolvedores e Instituições");?></h3>
                    <?php wp_nav_menu( array('menu' => 'Footer_DevsInst_'.pll_current_language() )); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php query_posts('p=187'); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php the_content();?>
          <?php endwhile; endif; ?>
          <p class="text-center">Copyright © <?php echo date("Y");?> - APPCÍVICO</p>
        </div>
      </footer>

    <?php wp_footer(); ?>

       <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
      <script>
        fixedNav();
        slideClick();
        var loop = setInterval("slideTour()", 12000);
      </script>

  </body>
</html>