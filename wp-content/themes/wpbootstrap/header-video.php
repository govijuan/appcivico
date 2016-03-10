<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
 <head>
    <!-- video -->
    <meta charset="utf-8">
    <title><?php wp_title('|'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="bacpuH8XgjGB8F9NmXgev0NF4ec1zS_5jzbDIJ0yKQQ" />

    <!-- Le styles -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="<?php bloginfo('stylesheet_url');?>?c=10" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri() . '/animate.css';?>" rel="stylesheet">
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
    <div class="close pull-right"><button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".menu-float">
          <i class="fa fa-times"></i></button></div>
    <div class="contents">
      <?php wp_nav_menu( array('menu' => 'Main_'.pll_current_language() )); ?>
    </div>
  </div>
<div class="tarja-topo"></div>
<div class="video-splash-home">
  <video autoplay loop poster="<?php echo get_template_directory_uri() . '/videos/video-snap.jpg';?>" id="bgvid">
    <source src="<?php echo get_template_directory_uri() . '/videos/vid-teste2-comp.webm';?>" type="video/webm">
    <source src="<?php echo get_template_directory_uri() . '/videos/vid-teste2-comp.mp4';?>" type="video/mp4">
    <source src="<?php echo get_template_directory_uri() . '/videos/vid-teste2-comp.ogg';?>" type="video/ogg">
  </video>
  <div id="polina">
    <div class="header-home">
      <div class="container" id="top">
        <div class="logo">
          <div class"container">
            <div class="row">
              <div class="col-sm-2 text-center-m">
                <a href="<?php echo site_url()."/".((pll_current_language() != "pt") ? pll_current_language() : ""); ?>" class="link-logo"><img src="<?php echo get_template_directory_uri() . "/bootstrap/css/images/logo.svg"?>" width="127" border="0"></a>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("widgetized-lang-flag") ) : ?>
                <?php endif; ?>
              </div>
              <div class="col-sm-10 slogan">
                <strong>BETTER APPS</strong> FOR A <strong>BETTER WORLD</strong>
              </div>
            </div>
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
  </div>  
</div>
<a href="#chamada" class="page-scroll see-more">
  <div class="link btn-circle">
    <i class="fa fa-angle-double-down animated"></i>
  </div>
</a>
<script>
  var video=document.getElementById("bgvid");

  function vidFade(){
    video.classList.add("stopfade");
  }
  video.addEventListener('ended',function(){
    video.pause();
    vidFade();
  },false);
  video.addEventListener('touchstart',function(e){
    e.preventDefault();
    video.play();
  });
</script>

  