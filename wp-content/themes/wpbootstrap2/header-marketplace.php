<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
 <head>
    <meta charset="utf-8">
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="bacpuH8XgjGB8F9NmXgev0NF4ec1zS_5jzbDIJ0yKQQ" />

    <!-- Le styles -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri() . '/animate.css';?>" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  </head>
  <?php if(is_page()) { $page_slug = 'page-'.$post->post_name; } ?>
  <body <?php body_class('marketplace-item'); ?>>

  <div class="menu-float collapse">
    <div class="close pull-right"><button data-toggle="collapse" data-target=".menu-float">X</button></div>
    <div class="contents">
      <?php wp_nav_menu( array('menu' => 'Main_'.pll_current_language() )); ?>
    </div>
  </div>
  <div class="header-internal">
    <div class="container" id="top">
      <div class="logo">
        <div class"container">
            <div class="row">
              <div class="col-sm-3 text-center">
                <a href="<?php echo site_url()."/".((pll_current_language() != "pt") ? pll_current_language() : ""); ?>" class="link-logo"><img src="<?php echo get_template_directory_uri() . "/bootstrap/css/images/logo-top.png"?>" border="0"></a>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("widgetized-lang-flag") ) : ?>
                <?php endif; ?>
              </div>
              <div class="col-sm-9 slogan">
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

      <div class="title pull-right">
        <h3>Marketplace</h3>
      </div>


    </div>
  </div>
