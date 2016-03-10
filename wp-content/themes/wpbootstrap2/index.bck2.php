<?php get_header(); ?>

<?php query_posts('p=157'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php the_content();?>
<?php endwhile; endif; ?>

<?php query_posts('p=134'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php the_content();?>
<?php endwhile; endif; ?>

<section class="axes padded">
  <div class="container">

  <?php query_posts('p=142'); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php the_content();?>
  <?php endwhile; endif; ?>

    <ul class="axes-list">
      <?php query_posts('category_name=Eixos&orderby=title&order=ASC'); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <li>
          <div class="axis-item">
            <div class="icon <?php echo get_field('codigo'); ?>">
            </div>
            <div class="over">
              <p><?php 
			if (pll_current_language() == "pt"){
				$read_more_label = "em breve";
			}else{
				$read_more_label = "coming soon";
			}
			echo $read_more_label;
		 ?></p>
            </div>
          </div>
          <div class="axis-caption">
            <?php the_title();?>
          </div>
      </li>
      <?php endwhile; endif; ?>
    </ul>

  </div>
</section>


<section class="partners padded">
  <div class="container">

    <?php query_posts('p=145'); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_content();?>
    <?php endwhile; endif; ?>

    <?php query_posts('cat=6&orderby=title&order=ASC'); ?>
    <ul>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li class="col-sm-4">
          <?php
            $image = get_field('logo');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)

            if( $image ) {
              $logo_url = wp_get_attachment_image_src( $image, $size );
            }
          ?>
          <div class="image">
            <img src="<?php echo $logo_url[0]; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="img-responsive">
          </div>
        </li>
      <?php endwhile; endif; ?>
   </ul>
  </div>
</section>

<?php get_footer(); ?>