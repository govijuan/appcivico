<?php
/**
 * The template for displaying MARKETPLACE posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<?php 

function wpEnqueueScripts(){
    wp_register_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', false, true, array('jquery'));
    wp_enqueue_script('jquery-easing');
    wp_register_script('lightbox', get_template_directory_uri() . '/lightbox/js/lightbox.min.js', false, true, array('jquery'));
    wp_enqueue_script('lightbox');
    wp_register_script('wow', get_template_directory_uri() . '/js/wow.min.js', false, true, array('jquery'));
    wp_enqueue_script('wow');
    wp_register_script('marketplace', get_template_directory_uri() . '/js/marketplace.js', false, true, array('jquery'));
    wp_enqueue_script('marketplace');
	wp_enqueue_style( 'style-name', get_template_directory_uri() . '/lightbox/css/lightbox.css' );
    wp_register_script('lib', get_template_directory_uri() . '/js/lib.js?c=3', false, true, array('jquery'));
    wp_enqueue_script('lib');
}    

add_action('wp_enqueue_scripts', 'wpEnqueueScripts');

include (TEMPLATEPATH . '/translations.inc.php');

?>

<?php get_header("marketplace"); ?>

<section class="marketplace-search">

  <hr>
  <div class="container">
  	<form>
	  	<a href="javascript:history.back();" class="btn-back"><?php echo tl("voltar ao índice");?></a>
  	</form>
  </div>
</section>

<section class="marketplace-detail">

	<div class="container">
		<?php // Start the loop.
			while ( have_posts() ) : the_post();
				$postid = get_the_ID();
				$title = get_the_title();
				$description = get_the_content();
		?>
		<div class="row">
			<div class="col-sm-12">
				<div class="app">
		        	<a href="<?php echo get_field('website'); ?>" target="_blank" style="background-color: <?php echo the_field('cor'); ?>;" class="visit">visit website</a>
		          <div class="row">
		            <div class="col-sm-2 logo">
		              <img src="<?php echo the_field('logo'); ?>">
		            </div>
		            <div class="col-sm-10 detalhes">
		            	<h1><?php echo $title; ?></h1>
		            	<h3><?php echo get_field('chamada'); ?></h3>
		            	<nav>
		            		<ul>
		            		    <li><a style="color: <?php echo the_field('cor'); ?>;" href="#appinfo" class="page-scroll">app info</a></li>
		            		    <li><a style="color: <?php echo the_field('cor'); ?>;" href="#features"><?php echo tl("Características");?></a></li>
		            		    <li><a style="color: <?php echo the_field('cor'); ?>;" href="#screenshots">screenshots</a></li>
		            		    <!-- <li><a style="color: <?php echo the_field('cor'); ?>;" href="#usecases"><?php echo tl("Casos de Uso");?></a></li> -->
		            		</ul>
		            	</nav>
		            </div>
		          </div>
		        </div>				
			</div>
		</div>



		<div class="row">
			<div class="col-sm-8">
				<!-- DESCRICAO -->
				<div id="appinfo" class="description">
					<h3>Description</h3>
					<?php 
						if ($description != ""){
							echo $description;
						}else{
							echo tl("Em breve");
						}
					?>
				</div>
				
				<!-- FEATURES -->
				<div id="features" class="description">
					<h3>Features</h3>
					<?php 

						$features = get_field('features');
						if ($features != ""){
							echo $features;
						}else{
							echo tl("Em breve");
						}
					?>
				</div>

				<!-- WHO IS USING IT -->
				<div id="features" class="description">
					<h3>Who is already using it</h3>
					<?php 

						$who_uses_it = get_field('who_uses_it');
						if ($who_uses_it != ""){
							echo $who_uses_it;
						}else{
							echo tl("Em breve");
						}
					?>
				</div>

				<!-- SCREENSHOTS -->
				<div id="screenshots" class="description">
					<h3>Screenshots</h3>
					<?php
					if ( get_post_gallery($postid) ) :
						$gallery = get_post_gallery( get_the_ID(), false );
						$ids = explode( ",", $gallery['ids'] );
						$j = 0;
					?>

					<div class="image-gallery">
						<div class="gallery">
							<div class="arrow left">
								<i class="fa fa-angle-left glyphicon"></i>
							</div>
							<div class="contents">
							  	<?php foreach( $gallery['src'] AS $src ){ ?>
							  		<?php $full_img_src = wp_get_attachment_image_src( $ids[$j], "full")?>
									<a href="<?php echo $full_img_src[0]; ?>" data-lightbox="gallery" target="_blank"><img src="<?php echo $src; ?>"></a>
								  	<?php $i++; ?>
								  	<?php $j++; ?>
							  	<?php } ?>
							</div>
							<div class="arrow right">
								<i class="fa fa-angle-right glyphicon"></i>
							</div>
						</div>
		            </div><?php endif; ?>
				</div>
				
			</div>



			<!-- DETALHES -->
			<div class="col-sm-4">
				<div class="details">

		            <!-- begin eixos -->
					<?php 

		              $posts = get_field('eixo');

		              if( $posts ): ?>
		              <div class="axes caption">
		              	<?php echo tl("Eixos sociais atendidos");?>
		                <ul>
		                <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
		                    <li>
		                      <div class="axis-icon <?php echo get_post_meta( $p->ID, 'codigo', true ); ?>" title="<?php echo $p->post_title; ?>" alt="<?php echo $p->post_title; ?>"></div>
		                    </li>
		                <?php endforeach; ?>
		                </ul>
		              </div>
		              <?php endif; ?>
		            <!-- end eixos -->



					<?php
						$devs = get_field("desenvolvedor");
						$devs_output = "";
						if ($devs){
							foreach( $devs as $p ){
								if ($devs_output != ""){
									$devs_output .= ", ";
								}
								$devs_output .= "<a href='" . get_post_meta( $p->ID, 'website', true ) . "' target='_blank'>" . $p->post_title . "</a>";
							}
						}

						$countries = get_field("pais");
						$countries_output = "";
						if ($countries){
							foreach( $countries as $p ){
								if ($countries_output != ""){
									$countries_output .= ", ";
								}
								$countries_output .= $p->post_title;
							}
						}
						if ($devs_output != ""){
							echo "<div class='caption'>" . tl("Desenvolvedor") . "</div><div class='value'>" . $devs_output . "</div>";
						}
						if ($countries_output != ""){
							echo "<div class='caption'>" . tl("País") . "</div><div class='value'>" . $countries_output . "</div>";
						}
						if (get_field('website') != ""){
							echo "<div class='caption'>" . tl("Site") . "</div><div class='value'><a href='" . get_field('website') . "' target='_blank'>" . get_field('website') . "</a></div>";
						}
					?>
					<p>&nbsp;</p>
					<div class="row">
						<button style="background-color: <?php echo the_field('cor'); ?>;" class="btn btn-implementa col-xs-12" data-toggle="modal" data-target="#contactModal"><?php echo tl("Quero implementar esse App");?>!</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="contactModalLabel"><?php echo tl("Implementação do App");?> "<?php echo $title; ?>"</h4>
		      </div>
		      <div class="modal-body">
		      	<p><?php echo tl("Preencha o formulário abaixo para obter informações de como implementar esse App");?>:</p>
		      	<div class="modal-form form">
		        	<?php echo do_shortcode( '[contact-form-7 id="602" title="App Contact"]' ); ?>
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo tl("Fechar");?></button>
		      </div>
		    </div>
		  </div>
		</div>
		<?php
			// End the loop.
			endwhile;// End Loop
		?>
	</div>
</section>

<?php get_footer(); ?>