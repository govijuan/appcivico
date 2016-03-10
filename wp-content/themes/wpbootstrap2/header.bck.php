<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
 <head>
    <meta charset="utf-8">
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  </head>
  <body <?php body_class(); ?>>
  <div class="menu-float collapse <?php echo language_menu;?>">
    <div class="close pull-right"><button data-toggle="collapse" data-target=".menu-float">X</button></div>
    <div class="contents">
      <?php wp_nav_menu( array('menu' => 'Main_'.pll_current_language() )); ?>
    </div>
  </div>
  <div class="header-home">
    <div class="container" id="top">
      <div class="logo">
        <div class"container">
          <a href="<?php echo site_url()."/".pll_current_language(); ?>" class="link-logo"><img src="<?php echo get_template_directory_uri() . "/bootstrap/css/images/logo-top.png"?>" border="0"></a>
           <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("widgetized-lang-flag") ) : ?>
           <?php endif; ?>        
        </div>
      </div>
      <div id="menu-top">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".menu-float">
          <i class="fa fa-bars"></i>
        </button>
      </div>

<?php query_posts('p=159'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php the_content();?>
<?php endwhile; endif; ?>


    </div>
  </div>