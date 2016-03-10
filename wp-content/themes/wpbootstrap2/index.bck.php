<?php get_header(); ?>

<section class="about padded">
  <div class="container">
    <div class="row">
      <div class="col-sm-offset-2 col-sm-8 text-center">
        <p>Somos um Cloud Service Broker (CSB), que tem como objetivo agregar serviços em nuvem, em nome de uma ou mais instituições (consumidores) através de três funções principais, que é agregação, integração e personalização. Os desenvolvedores oferecem aplicativos, o AppCívico tecnologia combinada, pessoas e metodologias para implementar e gerenciar projetos relacionados as instituições.</p>      
      </div>
    </div>

    <div class="row">
      <div class="col-sm-3">
        <h3 class="turq text-center">Desenvolvedor</h3>
        <img src="<?php echo get_template_directory_uri() . "/bootstrap/css/images/about-developer.png"?>" border="0" class="img-responsive">
        <ul class="turq">
          <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aplicativos Cívicos</li>
        </ul>
        <div class="text-center">
          <a class="btn btn-info" href="/desenvolvedor/">saiba mais</a>
        </div>
      </div>
      <div class="col-sm-6 content-center">
        <div class="about-center-img">
          <img src="<?php echo get_template_directory_uri() . "/bootstrap/css/images/about-arrow-blue.png"?>" class="pull-left">
          <img src="<?php echo get_template_directory_uri() . "/bootstrap/css/images/about-arrow-orange.png"?>" class="pull-right">
        </div>
        <br clear="all"/>
        <div class="row">
          <div class="col-sm-6">
            <ul class="turq">
              <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Infraestrutura em Nuvem</li>
              <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Gerenciamento de Projetos</li>
              <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Integração entre aplicativos</li>
              <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Monitoramento de serviços</li>
            </ul>
          </div>
          <div class="col-sm-6">
            <ul class="turq">
              </li>
              <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Parceiros de tecnologia</li>
              <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Gerenciamento de SLA</li>
              <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Personalização de Solução</li>
              <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Segurança da Informação</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <h3 class="orange text-center">Instituições</h3>
        <img src="<?php echo get_template_directory_uri() . "/bootstrap/css/images/about-institute.png"?>" border="0" class="img-responsive">
        <ul class="orange">
          <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Causas cívicas</li>
          <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Necessidades tecnológicas</li>
        </ul>
        <div class="text-center">
          <a class="btn btn-warning" href="/instituicoes/">saiba mais</a>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="marketplace padded">
  <div class="container">

    <h1 class="text-center">Marketplace</h1>
    <h3 class="text-center">A primeira vitrine de aplicativos cívicos da América Latina</h3>

    <?php query_posts('category_name=App&showposts=6'); ?>
    <ul class="row-fluid">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li style="background-color: <?php echo the_field('cor'); ?>;" class="col-sm-4">
          <div class="row">
            <div class="col-xs-10">
              <img src="<?php echo the_field('logo'); ?>">
              <div class="description"><?php echo the_field('chamada') ?></div>
              <button class="btn btn-marketplace" onClick="self.location='<?php the_permalink(); ?>';">Conheça</button>
            </div>
            <div class="col-xs-2">
              <div class="axes">
              <?php 

              $posts = get_field('eixo');

              if( $posts ): ?>
                <ul>
                <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                    <li>
                      <div class="axis-icon <?php echo get_post_meta( $p->ID, 'codigo', true ); ?>"></div>
                    </li>
                <?php endforeach; ?>
                </ul>
              <?php endif; ?>
              </div>
            </div>
          </div>
        </li>
      <?php endwhile; endif; ?>
   </ul>
  </div>
</section>

<section class="axes padded">
  <div class="container">

    <h1 class="text-center">Eixos Sociais e Cívicos</h1>
    <h3 class="text-center">A missão da AppCivico é auxiliar no impacto social através de tecnologia na América Latina, promovendo negócios com os desenvolvedores de software que têm como objetivo a melhoria da qualidade de vida das pessoas. Promovendo mudanças através de atuações em Eixos pré-definidos.</h3>

    <ul class="axes-list">
      <?php query_posts('category_name=Eixos'); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <li>
        <a href="<?php the_permalink(); ?>">
          <div class="axis-item">
            <div class="icon <?php echo get_field('codigo'); ?>">
            </div>
            <div class="over">
              <p>saiba mais</p>
            </div>
          </div>
          <div class="axis-caption">
            <?php the_title();?>
          </div>
        </a>
      </li>
      <?php endwhile; endif; ?>
    </ul>

  </div>
</section>

<section class="news padded">
  <div class="container">

    <h1 class="text-center">Notícias e Eventos</h1>

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

<section class="partners padded">
  <div class="container">

    <h1 class="text-center">Apoio e Realização</h1>

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