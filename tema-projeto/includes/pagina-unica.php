
    <?php while(have_posts()) : the_post(); ?>
      <h1>Teste 3</h1>
        <!-- post -->
        <article class="row-fluid posts" role="article">
          <h2 itemprop="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p class="muted">
            <span>Publicado em</span>
            <a rel="bookmark" title="" href=""><span class="entry-date" itemprop="datePublished"><?php the_time('d'); ?> de <?php the_time('F'); ?> de <?php the_time('Y'); ?></span></a>
          </p>
          <p>
            <?php the_content(); ?>
          </p>
          <p class="muted">
            <span><?php the_category(', '); ?></span>
            <!-- <a rel="category" title="" href="" itemprop="articleSection">Assuntos Gerais</a> -->
          </p>
        </article>
    <?php endwhile; ?>