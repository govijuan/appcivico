<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header("community"); ?>

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
		<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
		    <?php if(function_exists('bcn_display'))
		    {
		        bcn_display();
		    }?>
		</div>		
		<div class="row">
			<div class="col-sm-12">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
					$postid = get_the_ID();

					$url_post = strip_tags(get_the_content());
			      	if (preg_match("#https?://#", $url_post) === 0) {
		    			$url_post = 'http://'.$url_post;
					}

					?>
					<h3><a href="<?php echo $url_post; ?>" target="_blank" class="title">
			            <?php the_title();?>
			        </a></h3>
			        <?php $author = get_the_author(); ?>
			        <span class="author-name"><?php echo $author;?></span> | <span class="link-date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' atrás'; ?></span>

			        <?php comments_template(); ?> 
					<?php

				// End the loop.
				endwhile;// End Loop
				?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
