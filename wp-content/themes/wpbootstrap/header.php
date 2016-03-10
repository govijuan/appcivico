<!DOCTYPE html>
<html <?php language_attributes(); ?>>
 <head >
 <!-- header -->
    <meta charset="utf-8">
    <title><?php wp_title('|'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="bacpuH8XgjGB8F9NmXgev0NF4ec1zS_5jzbDIJ0yKQQ" />

    <!-- Le styles -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="<?php bloginfo('stylesheet_url');?>?v=1" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" />

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  </head>
  <?php if(is_page()) { $page_slug = 'page-'.$post->post_name; } ?>
  <body <?php body_class($page_slug); ?>>

    <header class="hidden-xs hidden-sm visible-md visible-lg">
      <div class='container'>
        <div class='col-xs-3 col-sm-2 col-md-2 col-lg-2' id='brand'>
          <a href="<?php echo site_url()."/".((pll_current_language() != "pt") ? pll_current_language() : ""); ?>" class="link-logo"><img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/logo_appcivico.png';?>" /></a>
        </div>
     

   <div class='col-lg-10 col-md-10 col-sm-8 col-xs-9 tagline'>
          <p>
            <!-- Civic apps
            <span>at</span>
            your fingertips -->

            <!-- <strong>Tecnologias que incentivam a participação social e a valorização daquilo que é público</strong> -->



<table width="90%" border="0">
  <tbody>
    <tr>
	<td>
	<?php if( trim(strtolower(pll_current_language())) == "pt" ) { ?>
		<strong>Tecnologias para aumentar o engajamento social e valorizar o que é público</strong>
	<?php } else { ?>
		<strong>Technologies to rise social engagement and values what is public </strong>
	<?php }?>
	</td>
      <td align="right" style="/* margin-left: 10px; */"><a href="/pt/"><img src="http://appcivico.com/wp-content/uploads/2015/12/pt.jpg" alt="Português" title="Português" data-pin-nopin="true" style="
    width: 60%;
"></a></td>
      <td align="right" style="/* margin-left: 10px; */"><a href="/en/"><img src="http://appcivico.com/wp-content/uploads/2015/12/en.jpg" alt="English" title="English" data-pin-nopin="true" style="
    width: 60%;
"></a></td>
    </tr>
  </tbody>
</table>



          </p>
        </div>



        <nav class='col-xs-10 hidden-sm-10 col-md-10 col-lg-10'>
          <?php wp_nav_menu( array('menu' => 'Main_'.pll_current_language() )); ?>
        </nav>
      </div>
    </header>

  <div class="menu-float collapse">
    <div class="close pull-right"><button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".menu-float">
          <i class="fa fa-times"></i>
        </button></div>
    <div class="contents">
      <?php wp_nav_menu( array('menu' => 'Main_'.pll_current_language() )); ?>
    </div>
  </div>
  <div class="header-home hidden-lg hidden-md visible-sm visible-xs">
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
                <!-- <strong>CIVIC APPS</strong> <span>at</span> <strong>YOUR FINGERTIPS</strong> -->
                <strong>Soluções tecnológicas que fomentam a participação social e a valorização daquilo que é público.</strong>
              </div>
            </div>
        </div>
      </div>
      <div id="menu-top" class="visible-xs visible-sm hidden-md hidden-lg">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".menu-float">
          <i class="fa fa-bars"></i>
        </button>
      </div>
    </div>
  </div>
