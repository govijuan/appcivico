<?php
/*
Template Name: Search Page
*/
?>
<?php
function wpEnqueueScripts(){
    wp_register_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', false, true, array('jquery'));
    wp_enqueue_script('jquery-easing');
    //wp_register_script('wow', get_template_directory_uri() . '/js/wow.min.js', false, true, array('jquery'));
    wp_enqueue_script('wow');
    wp_register_script('home', get_template_directory_uri() . '/js/home.js', false, true, array('jquery'));
    wp_enqueue_script('home');
    wp_register_script('lib', get_template_directory_uri() . '/js/lib.js?e=1', false, true, array('jquery'));
    wp_enqueue_script('lib');
}

add_action('wp_enqueue_scripts', 'wpEnqueueScripts');

include (TEMPLATEPATH . '/translations.inc.php');
?>

<?php get_header("internal"); ?>

    <link href="http://appcivico.com/wp-content/themes/wpbootstrap/animate.css" rel="stylesheet">
<!-- marketplace -->
<section class="marketplace-search">

  <hr>
  <div class="container">
    <?php get_search_form(); ?>
  </div>
</section>

<section class="marketplace">
  <div class="container">

<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

if( strlen($query_string) > 0 ) {
foreach($query_args as $key => $string) {
  $query_split = explode("=", $string);
  $search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach
} //if

$q = new WP_Query($search_query);

  /*    = new WP_Query( array( 'category_name' => 'Aplicativos',
                                'meta_key' => 'pre-lancamento',
                                'orderby' => array( 'meta_value_num' => 'ASC',
                                                    'title' => 'ASC' )
                              )
                        );*/
    ?>
    <?php $anim_delay = 0; ?>
    <ul class="row-fluid">
      <?php if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
        <?php
          $devs = get_field("desenvolvedor");
          $pre_launch = get_field("pre-lancamento");
          $devs_output = "";
          if ($devs){
            foreach( $devs as $p ){
              if ($devs_output != ""){
                $devs_output .= ", ";
              }
              $devs_output .= "<a href='" . get_post_meta( $p->ID, 'website', true ) . "' target='_blank'>" . $p->post_title . "</a>";
            }
          }

        ?>
        <li class="col-sm-4 wow fadeInUp" data-wow-delay="<?php echo $anim_delay;?>s">
          <a href="<?php the_permalink(); ?>">
          <div class="row">
            <div class="item" style="background-color: <?php echo the_field('cor'); ?>;">
              <div class="contents">
                <div class="logo"><img src="<?php echo the_field('logo'); ?>" class="img-responsive"></div>
                <div class="description"><?php echo get_field('chamada'); ?></div>
                <div class="button">
                  <?php if ($pre_launch==0){ echo $pre_launch;?>
                    <button class="btn btn-marketplace" onClick="self.location='<?php the_permalink(); ?>';"><?php echo tl("Conheça");?></button>
                  <?php }else{ ?>
                    <button class="btn btn-marketplace" onClick="self.location='<?php the_permalink(); ?>';"><?php echo tl("Em breve");?></button>
                  <?php } ?>
                </div>
                <div class="developer">
                  <?php if ($devs_output != ""){ ?>
                    <span class="label"><?php echo tl("Desenvolvedor");?></span><br /><?php echo $devs_output; ?>
                  <?php } ?>
                </div>
                <div class="axes">
                <?php

                $posts = get_field('eixo');

                if( $posts ): ?>
                  <ul>
                  <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                      <li>
                        <div class="axis-icon <?php echo get_post_meta( $p->ID, 'codigo', true ); ?>" title="<?php echo $p->post_title; ?>" alt="<?php echo $p->post_title; ?>"></div>
                      </li>
                  <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          </a>
        </li>
      <?php $anim_delay += 0.2; ?>
      <?php endwhile; endif; ?>
   </ul>
   <br clear="all"/>
   <p>&nbsp;</p>
   <div class="text-center">
    <a href="/<?php echo pll_current_language(); ?>/submit" class="btn btn-warning"><span aria-hidden="true"></span> <?php echo tl("SUBMETA SUA APLICAÇÃO AGORA MESMO");?>!</a>
   </div>
   <p>&nbsp;</p>

  </div>
</section>



<?php get_footer(); ?>
