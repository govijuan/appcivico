<?php
/*
Template Name: Community Page
*/
?>
<?php 
wp_enqueue_script(
		'custom-script',
		get_template_directory_uri() . '/js/community.js',
		false,
		true,
		array( 'jquery' )
	);
?>
<?php get_header("internal"); ?>

<section class="white padded">
	<div class="container">
		<div class="row">
		<?php if ( is_user_logged_in() ) { ?>
		  <?php
		    global $current_user;
		    get_currentuserinfo();
		  ?>
		  <div class="col-sm-8">
		  	<?php echo "Olá " . $current_user->user_login ?>
		  </div>
		  <div class="col-sm-4 text-right">
		  	<a href="<?php echo wp_logout_url(); ?>" class="btn btn-info">Sair</a>
		  </div>
		<?php }else{ ?> 
		  <div class="col-sm-8">
			  <?php wp_login_form(); ?>
		  </div>
		  <div class="col-sm-4 text-right">
		  </div>
		<?php } ?> 
		</div>


		<?php if ( is_user_logged_in() ) { ?>
		  	<button id="new-post" class="btn btn-success">Postar novo link</button>
		<?php }else{ ?> 
		  	<a href="<?php echo "/login?action=register"; ?>" class="btn btn-info">Cadastre-se para postar um link</a>
		<?php } ?> 
		<div class="link-form">
			<?php if (function_exists('user_submitted_posts')) user_submitted_posts(); ?>
		</div>
		<div class="links-list">
			<ul>
		      <?php query_posts('category_name=Comunidade&orderby=modified'); ?>
		      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		      <?php
		        $url_post = strip_tags(get_the_content());
		      	if (preg_match("#https?://#", $url_post) === 0) {
	    			$url_post = 'http://'.$url_post;
				}
		      ?>
		      <li>
		      	<p class="title">
			        <a href="<?php echo $url_post; ?>" target="_blank" class="title">
			            <?php the_title();?>
			        </a>
		        </p>
		      	<p class="foooter">
		      		<span class="link-date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' atrás'; ?></span> | <a href="<?php the_permalink();?>" class="comments-count"><?php echo comments_number();?></a>
		        </p>
		      </li>
		      <?php endwhile; endif; ?>
		    </ul>

			<div class="nav-previous alignleft"><?php next_posts_link(); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link(); ?></div>
	    </div>

	</div>
</section>

<?php get_footer(); ?>