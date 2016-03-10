<?php 

function wpEnqueueScripts(){
    wp_register_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', false, true, array('jquery'));
    wp_enqueue_script('jquery-easing');
    wp_register_script('home-video', get_template_directory_uri() . '/js/home-video.js', false, true, array('jquery'));
    wp_enqueue_script('home-video');
    wp_register_script('wow', get_template_directory_uri() . '/js/wow.min.js', false, true, array('jquery'));
    wp_enqueue_script('wow');
    wp_register_script('home', get_template_directory_uri() . '/js/home.js?c=1', false, true, array('jquery'));
    wp_enqueue_script('home');
    wp_register_script('lib', get_template_directory_uri() . '/js/lib.js?v=1', false, true, array('jquery'));
    wp_enqueue_script('lib');
}    

add_action('wp_enqueue_scripts', 'wpEnqueueScripts');

include (TEMPLATEPATH . '/translations.inc.php');
?>

<!-- HEADER VIDEO -->

<?php get_header(); ?>
    <section id="features">
      <div class='container' role='main'>
        <div id='services'>
          <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 painel' id='whitelabel'>
            <div class='col-lg-5 col-md-5 col-sm-6 col-xs-12 text'>
              <?php query_posts('p=1503'); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h3><?php the_title();?></h3>
                <?php the_content();?>
              <?php endwhile; endif; ?>
            </div>
            <div class='col-lg-7 col-md-7 col-sm-6 hidden-xs image'>
              <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/whitelabel_.png';?>" />
            </div>
          </div>

          <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 painel' id='strategy'>
            <div class='col-lg-5 col-md-5 col-sm-6 col-xs-12 text'>
              <?php query_posts('p=1516'); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h3><?php the_title();?></h3>
                <?php the_content();?>
              <?php endwhile; endif; ?>
            </div>
            <div class='col-lg-7 col-md-7 col-sm-6 hidden-xs image'>
              <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/strategy-implementation_.png';?>" />
            </div>
          </div>

          <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 painel' id='replication'>
            <div class='col-lg-5 col-md-5 col-sm-6 col-xs-12 text'>
              <?php query_posts('p=1521'); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h3><?php the_title();?></h3>
                <?php the_content();?>
              <?php endwhile; endif; ?>
            </div>
            <div class='col-lg-7 col-md-7 col-sm-6 hidden-xs image'>
              <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/local-replication_.png';?>" />
            </div>
          </div>

          <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 painel' id='capacity'>
            <div class='col-lg-5 col-md-5 col-sm-6 col-xs-12 text'>
              <?php query_posts('p=1512'); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h3><?php the_title();?></h3>
                <?php the_content();?>
              <?php endwhile; endif; ?>
            </div>
            <div class='col-lg-7 col-md-7 col-sm-6 hidden-xs image'>
              <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/capacity-building_.png';?>" />
            </div>
          </div>

          <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 painel' id='hosting'>
            <div class='col-lg-5 col-md-5 col-sm-6 col-xs-12 text'>
              <?php query_posts('p=1508'); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h3><?php the_title();?></h3>
                <?php the_content();?>
              <?php endwhile; endif; ?>
            </div>
            <div class='col-lg-7 col-md-7 col-sm-6 hidden-xs image'>
              <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/hosting_.png';?>" />
            </div>
          </div>
        </div>
        <nav class='service'>
          <ul>
            <li>
              <a class='active' data-name='whitelabel' href='#'>
              <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/menu-whitelabel_.png';?>" />
                <?php query_posts('p=1503'); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                  <p><?php the_title();?></p>
                <?php endwhile; endif; ?>
                <div>
                  <span></span>
                </div>
              </a>
            </li>
            <li>
              <a data-name='strategy' href='#'>
              <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/menu-strategy-implementation_.png';?>" />
                <?php query_posts('p=1516'); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                  <p><?php the_title();?></p>
                <?php endwhile; endif; ?>
                <div>
                  <span></span>
                </div>
              </a>
            </li>
            <li>
              <a data-name='replication' href='#'>
              <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/menu-local-replication_.png';?>" />
                <?php query_posts('p=1521'); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                  <p><?php the_title();?></p>
                <?php endwhile; endif; ?>
                <div>
                  <span></span>
                </div>
              </a>
            </li>
            <li>
              <a data-name='capacity' href='#'>
              <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/menu-capacity-building_.png';?>" />
                <?php query_posts('p=1512'); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                  <p><?php the_title();?></p>
                <?php endwhile; endif; ?>
                <div>
                  <span></span>
                </div>
              </a>
            </li>
            <li>
              <a data-name='hosting' href='#'>
              <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/menu-hosting_.png';?>" />
                <?php query_posts('p=1508'); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                  <p><?php the_title();?></p>
                <?php endwhile; endif; ?>
                <div>
                  <span></span>
                </div>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </section>

<!-- Trainings -->
<a id="chamada" class="anchor"></a>
<section class="chamada padded">
  <div class="container">

    <div class="row">
      <div class="col-sm-offset-2 col-sm-8 text-center">
        <?php query_posts('p=1721'); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php the_content();?>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- CHAMADA FOUNDATIONS -->

<a id="chamada" class="anchor"></a>
<section class="chamada padded">
  <div class="container">

<div class="row">
      <div class="col-sm-offset-2 col-sm-8 text-center">
        <?php query_posts('p=1808'); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php the_content();?>
        <?php endwhile; endif; ?>
      </div>
    </div>

    <div class="row logos">
      <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 text-center">
        <a href="http://redciudades.net/" target="_blank">   
          <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/logo-rciudades.jpg';?>" id="l1" onmousemove="l1On()" onmouseout="l1Off()" width="90" border="0">
        </a>
      </div>

      <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 text-center">
        <a href="http://www.nossasaopaulo.org.br/" target="_blank">
          <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/logo-nsp.jpg';?>" id="l2" onmousemove="l2On()" onmouseout="l2Off()" width="128" border="0">
        </a>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 text-center">
        <a href="http://www.cidadessustentaveis.org.br/" target="_blank">
          <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/logo-csustent.jpg';?>" id="l3" onmousemove="l3On()" onmouseout="l3Off()" width="232" border="0">
        </a>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 text-center">
        <a href="http://www.fundacioncorona.org.co/" target="_blank">
          <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/logo-fcor.jpg';?>" id="l4" onmousemove="l4On()" onmouseout="l4Off()" width="222" border="0">
        </a>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 text-center">
        <a href="http://www.prefeitura.sp.gov.br/cidade/secretarias/planejamento/prodam/" target="_blank">
          <img src="<?php echo get_template_directory_uri() . '/bootstrap/css/images/logo-prod.jpg';?>" id="l5" onmousemove="l5On()" onmouseout="l5Off()" width="178" border="0">
        </a>
      </div>
    </div>

  

  </div>
</section>


<!-- MARKETPLACE -->

<a id="marketplace" class="anchor"></a>
<section class="marketplace padded">
  <div class="container">

    <h1 class="text-center"><?php echo tl("Soluções cívicas certificadas pelo AppCivico");?></h1>

    <?php 
      $q = new WP_Query( array( 'category_name' => 'Aplicativos',
                                'meta_key' => 'pre-lancamento',
                                'orderby' => array( 'meta_value_num' => 'ASC',
                                                    'title' => 'ASC' ) 
                              )
                        );
    ?>
    <?php $anim_delay = -2; ?>
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
              $devs_output .= "<a href='" . get_post_meta( $p->ID, 'website', true ) . "' target='_blank'>" . $p->post_title . "</a>";
            }
          }

        ?>
        <li class="col-sm-4 wow zoomIn" data-wow-delay="<?php echo $anim_delay;?>s">
          <a href="<?php the_permalink(); ?>">
          <div class="row">
            <div class="item" style="background-color: <?php echo the_field('cor'); ?>;">
              <div class="contents">
                <div class="logo"><img src="<?php echo the_field('logo'); ?>" class="img-responsive"></div>
                <div class="description"><?php echo get_field('chamada'); ?></div>
                <div class="button">
                  <?php if ($pre_launch==0){ echo $pre_launch;?>
                    <button class="btn btn-marketplace" onClick="self.location='<?php the_permalink(); ?>';"><?php echo tl("Conheça");?></button>
                  <?php }else{ ?>
                    <button class="btn btn-marketplace" onClick="self.location='<?php the_permalink(); ?>';"><?php echo tl("Em breve");?></button>
                  <?php } ?>
                </div>
                <div class="developer">
                  <?php if ($devs_output != ""){ ?>
                    <span class="label"><?php echo tl("Desenvolvedor");?></span><br /><?php echo $devs_output; ?>
                  <?php } ?>
                </div>
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
              </div>
            </div>
          </div>
        </li>
        </a>
      <?php $anim_delay += 0.2; ?>
      <?php endwhile; endif; ?>
   </ul>
   <br clear="all"/>
   <p>&nbsp;</p>
   <div class="text-center">
    <a href="/<?php echo pll_current_language(); ?>/submit" class="btn btn-warning"><span class="glyphicon" aria-hidden="true"></span> <?php echo tl("SUBMETA SUA APLICAÇÃO AGORA MESMO");?>!</a>
   </div>
   <p>&nbsp;</p>

  </div>
</section>

<!-- <?php query_posts('p=505'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php the_content();?>
<?php endwhile; endif; ?> -->

<?php query_posts('p=157'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php the_content();?>
<?php endwhile; endif; ?>



<!-- EIXOS -->
<?php /*?><section class="axes padded">
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
      echo tl("Em breve");
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
</section><?php */?>


<!-- NOTICIAS -->



<!--//
<section class="news padded">
  <div class="container">

    <h1 class="text-center"><?php echo tl("Notícias e Eventos");?></h1>

    <?php query_posts('cat=4&showposts=8'); ?>
    <ul class="row-fluid">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li class="col-sm-3">
          <?php
            $image = get_field('imagem_da_chamada');
            $size = 'medium'; // (thumbnail, medium, large, full or custom size)

            if( $image ) {
              $background_image = wp_get_attachment_image_src( $image, $size );
            }
          ?>
          <div class="image">
            <a href="<?php the_permalink(); ?>"><div class="contents" style="background-image: url('<?php echo $background_image[0]; ?>');"></div></a>
          </div>
          <div class="body">
            <p class="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></p>
            <p class="contents"><?php echo get_field('chamada'); ?> <a href="<?php the_permalink(); ?>">Leia mais</a></p>
            <p class="date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' atrás'; ?></p>
          </div>
        </li>
      <?php endwhile; endif; ?>
   </ul>
  </div>
</section>
//-->
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