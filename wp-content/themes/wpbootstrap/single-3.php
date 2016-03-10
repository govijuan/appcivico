<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header("axes"); ?>

<section class="axes-content padded">

	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<h3>Descrição</h3>
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
					$postid = get_the_ID();
					$postobj = get_post();

					the_excerpt();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );


				// End the loop.
				endwhile;// End Loop
				?>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
	</div>
</section>

<section class="grey padded">

	<div class="container">
		<h3>Apps relacionados</h3>
		<?php

			$args = array(
						'category_name' => 'Aplicativos',
						'meta_query' => array(
							array(
								'key' => 'eixo', // name of custom field
								'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
								'compare' => 'LIKE'
							)
						)
			);
	
			$q = new WP_Query( $args );
			$cont = 0;
		?>

		<div class="apps-related-list marketplace">
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
		              $img_id = get_post_meta( $p->ID, 'logo', true );
		              $img = wp_get_attachment_url( $img_id );
		              if ($img != ""){
		                $devs_output .= "<a href='" . get_post_meta( $p->ID, 'website', true ) . "' target='_blank'><img src='" . $img . "'></a>";
		              }else{
		                $devs_output .= "<a href='" . get_post_meta( $p->ID, 'website', true ) . "' target='_blank'>" . $p->post_title . "</a>";
		              }
		            }
		          }

		        ?>
		        <li class="col-sm-4">
		          <div class="row">
		            <div class="item" style="background-color: <?php echo the_field('cor'); ?>;">
		              <div class="contents">
		                <img src="<?php echo the_field('logo'); ?>">
		                <div class="description"><?php echo get_field('chamada'); ?></div>
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
		                <div class="app-info">
		                  <div class="row">
		                    <div class="col-sm-7">
		                      Desenvolvedor<br /><?php echo $devs_output; ?>
		                    </div>
		                    <div class="col-sm-5 text-right">
		                      <?php if ($pre_launch==0){ echo $pre_launch;?>
		                        <button class="btn btn-marketplace" onClick="self.location='<?php the_permalink(); ?>';">Conheça</button>
		                      <?php }else{ ?>
		                        <div class="em-breve">Em breve</div>
		                      <?php } ?>
		                    </div>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </li>
		      <?php endwhile; endif; ?>
		   </ul>
		</div>
	</div>
</section>

<?php get_footer(); ?>
