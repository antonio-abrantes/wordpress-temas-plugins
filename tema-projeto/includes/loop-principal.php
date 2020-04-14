<h1>Teste loop-principal.php</h1>    
<!-- post -->
<article class="row-fluid posts" role="article">
  <h2 itemprop="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <p class="muted">
    <span>Publicado em</span>
    <a rel="bookmark" title="" href=""><span class="entry-date" itemprop="datePublished"><?php the_time('d'); ?> de <?php the_time('F'); ?> de <?php the_time('Y'); ?></span></a>
  </p>
  <p>

    <?php 
    the_excerpt();
    ?>
  </p>
  <p class="muted">
    <span><?php the_category(', '); ?></span>
  </p>
</article>


    <!-- Paginação Simples -->
<!--     <?php previous_posts_link('<< Novos Posts'); ?> &nbsp;
    <?php next_posts_link('Posts Anteriores >>') ?> -->
















<!--         <article class="row-fluid posts" role="article">
          <h2 itemprop="name"><a href="#">Título do Posts</a></h2>
          <p class="muted">
            <span>Publicado em</span>
            <a rel="bookmark" title="" href=""><span class="entry-date" itemprop="datePublished">21 de março de 2012</span></a>
          </p>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p class="muted">
            <span>Categoria</span>
            <a rel="category" title="" href="" itemprop="articleSection">Assuntos Gerais</a>
          </p>
        </article>

        <article class="row-fluid posts" role="article">
          <h2 itemprop="name"><a href="#">Título do Posts</a></h2>
          <p class="muted">
            <span>Publicado em</span>
            <a rel="bookmark" title="" href=""><span class="entry-date" itemprop="datePublished">21 de março de 2012</span></a>
          </p>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p class="muted">
            <span>Categoria</span>
            <a rel="category" title="" href="" itemprop="articleSection">Assuntos Gerais</a>
          </p>
        </article> -->
        <!--/post -->