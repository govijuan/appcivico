<?php
/*
Template Name: Equipe Page
*/
?>
<?php 
function wpEnqueueScripts(){
    wp_register_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', false, true, array('jquery'));
    wp_enqueue_script('jquery-easing');
    wp_register_script('wow', get_template_directory_uri() . '/js/wow.min.js', false, true, array('jquery'));
    wp_enqueue_script('wow');
    wp_register_script('home', get_template_directory_uri() . '/js/home.js', false, true, array('jquery'));
    wp_enqueue_script('home');
    wp_register_script('lib', get_template_directory_uri() . '/js/lib.js?q=1', false, true, array('jquery'));
    wp_enqueue_script('lib');
}    

add_action('wp_enqueue_scripts', 'wpEnqueueScripts');
?>

<?php get_header("internal"); ?>

<section class="white padded">
  <div class="container">
    <?php if ( have_posts() ) : while( have_posts() ) : the_post();?>
      <h3><?php the_content(); ?></h3>
    <?php endwhile; endif;?>

    <?php 
      $q = new WP_Query( array( 'category_name' => 'Equipe') );
    ?>
    <?php $anim_delay = 0; ?>
    <ul class="row-fluid team-list">
      <?php if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
        <li class="col-sm-4 wow fadeInUp" data-wow-delay="<?php echo $anim_delay;?>s">
          <div class="row">
            <div class="item">
              <div class="contents">
                <img src="<?php echo the_field('imagem'); ?>">
                <div class="name"><?php echo get_the_title();?></div>
                <div class="area"><?php echo get_field('cargo'); ?></div>
                <div class="description">
                  <?php echo get_the_content();?>
                </div>
              </div>
            </div>
          </div>
        </li>
      <?php $anim_delay += 0.2; ?>
      <?php endwhile; endif; ?>
   </ul>

  </div>
</section>

<?php get_footer(); ?>