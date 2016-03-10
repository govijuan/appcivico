<?php
/*
Template Name: Default Page
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
    wp_register_script('lib', get_template_directory_uri() . '/js/lib.js?c=1', false, true, array('jquery'));
    wp_enqueue_script('lib');
}    
add_action('wp_enqueue_scripts', 'wpEnqueueScripts');
include (TEMPLATEPATH . '/translations.inc.php');
?>
<?php get_header("internal"); ?>

<?php if ( have_posts() ) : while( have_posts() ) : the_post();
     the_content();
endwhile; endif; ?>

<?php get_footer(); ?>