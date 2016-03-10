<?php 

function wpEnqueueScripts(){
    wp_register_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', false, true, array('jquery'));
    wp_enqueue_script('jquery-easing');
    wp_register_script('home-video', get_template_directory_uri() . '/js/home-video.js', false, true, array('jquery'));
    wp_enqueue_script('home-video');
    wp_register_script('wow', get_template_directory_uri() . '/js/wow.min.js', false, true, array('jquery'));
    wp_enqueue_script('wow');
    wp_register_script('home', get_template_directory_uri() . '/js/home.js', false, true, array('jquery'));
    wp_enqueue_script('home');
}    

add_action('wp_enqueue_scripts', 'wpEnqueueScripts');

include (TEMPLATEPATH . '/translations.inc.php');

?>
<?php get_header("video"); ?>

<a id="marketplace" class="anchor"></a>
<section class="marketplace padded">
  <div class="container">

    <h1 class="text-center">Marketplace</h1>
    <h3 class="text-center"><?php echo tl("Soluções cívicas certificadas pelo AppCivico");?></h3>

    <?php 
      $q = new WP_Query( array( 'category_name' => 'Aplicativos',
                                'meta_key' => 'pre-lancamento',
                                'orderby' => array( 'meta_value_num' => 'ASC',
                                                    'title' => 'DESC' ) 
                              )
                        );
    ?>
    <?php $anim_delay = 0; ?>
    <ul class="row-fluid">
      <?php $anim_delay = 0; ?>
      <?php if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
        <?php
          $chamada = get_field("chamada");
          $pre_launch = get_field("pre-lancamento");
          $posts = get_field('eixo');

          $logo_src = get_field('logo');
          $devs = get_field("desenvolvedor");
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
        <li class="col-sm-4 wow fadeInUp" data-wow-delay="<?php echo $anim_delay;?>s">
          <div class="row">
            <div class="item" style="background-color: <?php echo the_field('cor'); ?>;">
              <div class="contents">
                <img src="<?php echo $logo_src; ?>">
                <div class="description"><?php echo $chamada; ?></div>
                <div class="axes">
                <?php 
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
                      <?php echo tl("Desenvolvedor");?><br /><?php echo $devs_output; ?>
                    </div>
                    <div class="col-sm-5 text-right">
                      <?php if ($pre_launch==0){?>
                        <button class="btn btn-marketplace" onClick="self.location='<?php the_permalink(); ?>';"><?php echo tl("Conheça")?></button>
                      <?php }else{ ?>
                        <div class="em-breve"><?php echo tl("Em breve")?></div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <?php $anim_delay += 0.2; ?>
      <?php endwhile; ?>
      <?php else: ?>
          <h3 class="text-center"><?php echo tl("Nenhum aplicativo encontrado");?></h3>
      <?php endif; ?>
   </ul>
   <br clear="all"/>
   <p>&nbsp;</p>
   <div class="text-center">
    <a href="/submit" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <?php echo tl("SUBMETA SUA APLICAÇÃO AGORA MESMO");?>!</a>
   </div>
   <p>&nbsp;</p>

  </div>
</section>

<?php query_posts('p=157'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php the_content();?>
<?php endwhile; endif; ?>

<section class="axes padded">
  <div class="container">

  <?php query_posts('p=142'); ?>
  <?php $anim_delay = 0; ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php the_content();?>
  <?php endwhile; endif; ?>

    <ul class="axes-list">
      <?php query_posts('category_name=Eixos&orderby=title&order=ASC'); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <li class="wow fadeIn" data-wow-delay="<?php echo $anim_delay;?>s">
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
      <?php $anim_delay += 0.2; ?>
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