<?php
/*
Template Name: Marketplace Page
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
    wp_register_script('lib', get_template_directory_uri() . '/js/lib.js?w=1', false, true, array('jquery'));
    wp_enqueue_script('lib');
}    

add_action('wp_enqueue_scripts', 'wpEnqueueScripts');

include (TEMPLATEPATH . '/translations.inc.php');
?>

<?php get_header("internal"); ?>


<section class="marketplace-search">

  <hr>
  <div class="container">
    <form method="get">
        <div class="float-left">
<!--//          <div class="field">
            <select name="order" onChange="document.forms[0].submit();">
              <option value="">Ordenar Por</option>
              <option value="name" <?php if ($_GET["order"] == "name") echo "selected" ?>>Nome</option>
              <option value="axis" <?php if ($_GET["order"] == "axis") echo "selected" ?>>Eixo</option>
            </select>
          </div>//-->
          <div class="field">
            <input type="text" name="search" value="<?php echo $_GET["search"] ?>" placeholder="<?php echo tl("Buscar");?>" size="30">
            <button class="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
          </div>
        </div>
        <div class="float-right">
          
        </div>
    </form>
  </div>
</section>

<section class="marketplace">
  <div class="container">

    <?php 

      if(isset($_GET["order"])){
        switch($_GET["order"]){
          case "name":
            $orderby = array( 'title' => 'ASC' );
            break;
          case "axis":
            $orderby = array( 'eixo' => 'ASC' );
            break;
        }
      }else{
        $orderby = array( 'meta_value_num' => 'ASC',
                          'title' => 'ASC' );
      }

      $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
      $args = array( 'category_name' => 'Aplicativos',
                      'meta_key' => 'pre-lancamento',
                      'posts_per_page' => 6,
                      'paged' => $paged,
                      'orderby' => $orderby 
                    );

      if (isset($_GET["search"]) && $_GET["search"] != ""){
        $args["s"] = strip_tags($_GET["search"]);
        echo "<h3 class='text-center'>" . tl("Resultados para") . " &quot;" . $_GET["search"] . "&quot;</h3>";
      }

      $q = new WP_Query( $args );
    ?>
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
        <li class="col-sm-4 wow fadeInUp" data-wow-delay="<?php echo $anim_delay;?>s">
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
      <?php $anim_delay += 0.2; ?>
      <?php endwhile; endif; ?>
   </ul>
   <br clear="all"/>
   <ul class="pagination pull-right">
   <?php 
    $big = 999999999;
    echo paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'current' => max( 1, get_query_var('paged') ),
      'total' => $q->max_num_pages,
      'before_page_number' => '<li>',
      'after_page_number'  => '</li>',
      'prev_text'          => '<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>',
      'next_text'          => '<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>'
    ));
   ?>
   </div>
   <p>&nbsp;</p>
   <div class="text-center">
    <a href="/<?php echo pll_current_language(); ?>/submit" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <?php echo tl("SUBMETA SUA APLICAÇÃO AGORA MESMO");?>!</a>
   </div>
   <p>&nbsp;</p>

  </div>
</section>


<?php get_footer(); ?>