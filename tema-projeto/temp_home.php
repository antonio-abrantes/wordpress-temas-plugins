<?php
	/*
		template name: Página inicial
	*/
?>


<?php get_header('home'); //aponta para header-home.php ?>

<!-- Container -->
  <div class="container">

    <div class="row-fluid">

      <?php 

          $postsEmDestaque = get_option('sticky_posts');

          $query = new WP_QUERY([
            'posts_per_page' => 3,
            'post__in' => $ $postsEmDestaque
          ]);

          if(isset($postsEmDestaque[0])) :

       ?>

      <!-- Posts -->
      <div class="col-sm-12 blog-main blog-posts" itemscope itemtype="http://schema.org/Article">
        <h2 class="blog-main-title">Posts em Destaque</h2>
        <!-- post -->
        <?php while($query->have_posts()) : $query->the_post()  ?>
        <article class="row-fluid posts col-md-3" role="article">
          <h2 itemprop="name" class="posts-title"><a href="#"><?php the_title(); ?></a></h2>
          <p class="muted">
            <span>Publicado em</span>
            <a rel="bookmark" title="" href=""><span class="entry-date" itemprop="datePublished"><?php the_time('d'); ?> de <?php the_time('F'); ?> de <?php the_time('Y'); ?></span></a>
          </p>
          <p>
            <?php the_excerpt(); ?>
          </p>
          <p class="muted">
            <span><?php the_category(', '); ?></span>
            <a rel="category" title="" href="" itemprop="articleSection">Assuntos Gerais</a>
          </p>
        </article>
        <?php endwhile; ?>
        <!--/post -->
      </div>
      <!-- Posts -->
      
      <?php endif; ?>


      <!-- Cursos -->
      <div class="col-sm-12 blog-main blog-cursos" itemscope itemtype="http://schema.org/Article">
        <h2 class="blog-main-title">Cursos</h2>
        <!-- post -->
        <?php 
          $cursos = new WP_QUERY([
            'posts_per_page'=> 6,
            'post_type' => 'cursos'
          ]);

          while($cursos->have_posts()) : $cursos->the_post()

        ?>
        <article class="row-fluid cursos col-md-2 col-sm-3 text-center" role="article">
          <a href="<?php the_permalink(); ?>">
            <div class="cursos-img">
              <!-- <img src="images/android.png" width="150" alt="Título do curso"> -->
              <?php the_post_thumbnail('curso-miniatura'); ?>
            </div>
            <h2 itemprop="name" class="cursos-title"><?php the_title(); ?></h2>
          </a>
        </article>
        <?php endwhile; ?>
        <!--/post -->
      </div>
      <!-- Cursos -->
      
    </div>
  </div>

<?php get_footer(); ?>