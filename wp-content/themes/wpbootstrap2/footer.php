      <footer class="padded">
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
              <img src="<?php echo get_template_directory_uri() . "/bootstrap/css/images/logo-footer.png"?>">

              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("widgetized-language") ) : ?>
              <?php endif; ?>
            </div>
            <div class="col-sm-9">
              <div class="menu-footer">
		 <h3>AppCívico</h3>
		 <?php wp_nav_menu( array('menu' => 'Main_'.pll_current_language() )); ?>
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

  </body>
</html>