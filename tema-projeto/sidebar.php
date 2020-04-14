<?php 
  if(! is_active_sidebar('tw-sidebar')){
    return;
  }

 ?>

<!-- sidebar -->
<aside class="col-sm-3 col-xs-12 blog-sidebar well">

  <ul class="list-unstyled">
    <?php dynamic_sidebar('tw-sidebar'); ?>
  </ul>

<!-- <div class="sidebar-module">
  <h4>Posts recentes</h4>
  <ol class="list-unstyled">
    <?php 
      $ultimos_posts = new WP_QUERY('posts_per_page=10');
      while ($ultimos_posts->have_posts()) : $ultimos_posts->the_post();
     ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
  <?php endwhile; ?>
  </ol>
</div>
<div class="sidebar-module">
  <h4>Arquivos</h4>
  <ol class="list-unstyled">
    <li><a href="#">Link</a></li>
    <li><a href="#">Link</a></li>
    <li><a href="#">Link</a></li>
  </ol>
</div>
<div class="sidebar-module">
  <h4>Categorias</h4>
  <ol class="list-unstyled">
    <?php wp_list_categories([
        'taxonomy'=>'category',
        'title_li'=>''
      ]); ?>
  </ol>
</div> -->
</aside>
<!--/sidebar -->