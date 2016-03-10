<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

include (TEMPLATEPATH . '/translations.inc.php');

get_header("news"); ?>

<section class="white padded news-detail">

	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
					$postid = get_the_ID();
					$postobj = get_post();

					echo "<div class='post'>";
					echo "<h2>" . get_the_title() . "</h2>";
					echo "<p class='date'>" . get_the_date() . "</p>";
					echo "<p class='content'>" . get_the_content() . "</p>";
					echo "</div>";

				// End the loop.
				endwhile;// End Loop
				?>
			</div>
			<div class="col-sm-4">
				<div class="more-news">
					<h3><?php echo tl("Mais notícias e eventos");?></h3>
					<ul>
						<?php
					      $args = array( 'category_name' => 'Notícias e Eventos',
					                      'posts_per_page' => 5,
					                      'orderby' => 'date',
					                      'post__not_in' => array($postid) 
					                    );

					      $q = new WP_Query( $args );
					    ?>
						<?php if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
						<li>
							<div class="thumb">
							<?php
								$image = get_field('imagem_da_chamada');
					            $size = 'thumbnail';

					            if( $image ) {
					              $image_src = wp_get_attachment_image_src( $image, $size );
					              echo "<img src='" . $image_src[0] . "' class='img-responsive'>";
					            }
							?>	
							</div>
							<div class="contents">
								<p class="title"><?php echo get_the_title();?></p>
								<p class="date"><?php echo get_the_date("F j, Y");?></p>
								<p class="summary">
									<?php echo get_field('chamada');?>
									<a href="<?php the_permalink();?>"><?php echo tl("Leia mais")?></a>
								</p>
							</div>
						</li>
						<?php endwhile; ?>
						<?php else: ?>
						<li>
							<?php echo tl("Nenhuma notícia encontrada");?>
						</li>
						<?php endif; ?>
					</ul>
					<br clear="all"/>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
