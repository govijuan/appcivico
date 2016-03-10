<?php
/*
Template Name: Marketplace Temp Page
*/
?>
<?php get_header("internal"); ?>


<section class="marketplace-search">

  <hr>
  <div class="container">
    <form method="get">
        <div class="float-left">
          <div class="field">
            <select name="order" onChange="document.forms[0].submit();">
              <option value="">Ordenar Por</option>
              <option value="name" <?php if ($_GET["order"] == "name") echo "selected" ?>>Nome</option>
              <option value="axis" <?php if ($_GET["order"] == "axis") echo "selected" ?>>Eixo</option>
            </select>
          </div>
          <div class="field">
            <input type="text" name="search" value="<?php echo $_GET["search"] ?>" placeholder="Buscar">
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

      if (isset($_GET["search"])){
        $args["s"] = strip_tags($_GET["search"]);
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
      <?php endwhile; ?>
      <?php else: ?>
          <h3 class="text-center">Nenhum aplicativo encontrado</h3>
      <?php endif; ?>
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
    <a href="/submit" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> SUBMETA SUA APLICAÇÃO AGORA MESMO!</a>
   </div>
   <p>&nbsp;</p>

  </div>
</section>


<?php get_footer(); ?>