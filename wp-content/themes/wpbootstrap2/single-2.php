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
    wp_register_script('lightbox', get_template_directory_uri() . '/lightbox/js/lightbox.min.js', false, true, array('jquery'));
    wp_enqueue_script('lightbox');
    wp_register_script('marketplace', get_template_directory_uri() . '/js/marketplace.js', false, true, array('jquery'));
    wp_enqueue_script('marketplace');
	wp_enqueue_style( 'style-name', get_template_directory_uri() . '/lightbox/css/lightbox.css' );
}    

add_action('wp_enqueue_scripts', 'wpEnqueueScripts');
?>

<?php get_header("marketplace"); ?>

<section class="marketplace-search">

  <hr>
  <div class="container">
  	<form>
	  	<a href="../marketplace/" class="btn-back">voltar ao índice</a>
  	</form>
  </div>
</section>

<section class="marketplace">

	<div class="container">
		<?php // Start the loop.
			while ( have_posts() ) : the_post();
				$postid = get_the_ID();
				$title = get_the_title();
				$description = get_the_content();
		?>
		<div class="row">
			<div class="col-sm-12">
		        <div class="app" style="background-color: <?php echo the_field('cor'); ?>;">
		          <div class="row">
		            <div class="col-sm-6 logo">
		              <img src="<?php echo the_field('logo'); ?>">
		            </div>
		            <div class="col-sm-6 text-right">
		              <?php 

		              $posts = get_field('eixo');

		              if( $posts ): ?>
		              <div class="axes">
		              	Eixos sociais atendidos
		                <ul>
		                <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
		                    <li>
		                      <div class="axis-icon <?php echo get_post_meta( $p->ID, 'codigo', true ); ?>" title="<?php echo $p->post_title; ?>" alt="<?php echo $p->post_title; ?>"></div>
		                    </li>
		                <?php endforeach; ?>
		                </ul>
		              </div>
		              <?php endif; ?>
		            </div>
		          </div>

				<?php
					if ( get_post_gallery($postid) ) :
						 $gallery = get_post_gallery( get_the_ID(), false );
				?>
		          <div class="row">
		            <div class="col-sm-12">
			            <div class="image-gallery">
							<div class="gallery">
								<div class="arrow left">
									<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
								</div>
								<div class="contents">
								  	<?php foreach( $gallery['src'] AS $src ){ ?>
										<a href="<?php echo $src; ?>" data-lightbox="gallery"><img src="<?php echo $src; ?>"></a>
									  	<?php $i++; ?>
								  	<?php } ?>
								</div>
								<div class="arrow right">
									<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
								</div>
							</div>
			            </div>
			          </div>
		          </div>
				<?php
					endif; 
    			?>
		        </div>				
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<div class="description">
					<h3>Descrição</h3>
					<?php echo $description;?>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="details">
					<h3>Detalhes</h3>
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
						echo "<div class='caption'>Desenvolvedor</div><div class='value'>" . $devs_output . "</div>";
						echo "<div class='caption'>País</div><div class='value'>" . $countries_output . "</div>";
						echo "<div class='caption'>Site</div><div class='value'><a href='" . get_field('website') . "' target='_blank'>" . get_field('website') . "</a></div>";
					?>
					<p>&nbsp;</p>
					<div class="row">
						<button class="btn btn-info col-xs-12" data-toggle="modal" data-target="#contactModal">Quero implementar esse App!</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="contactModalLabel">Implementação do App "<?php echo $title; ?>"</h4>
		      </div>
		      <div class="modal-body">
		      	<p>Preencha o formulário abaixo para obter informações de como implementar esse App:</p>
		      	<div class="modal-form form">
		        	<?php echo do_shortcode( '[contact-form-7 id="325" title="Contato App"]' ); ?>
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
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