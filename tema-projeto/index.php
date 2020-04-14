
<?php get_header('home'); ?>

<!-- Container -->
<div class="container">

  <div class="row-fluid">
<h1>Teste Index.php</h1>
    <!-- Posts -->
    <div class="col-sm-9 blog-main" itemscope itemtype="http://schema.org/Article">

      <!-- posts -->
      <?php while(have_posts()) : the_post();

      if(has_post_format()){
        get_template_part('/includes/format', get_post_format());
      }else{
        get_template_part('/includes/loop', 'principal');
      }

      endwhile;
    ?>

  </div>
  <!-- Paginação Completa -->
  <?php
  if ( function_exists('wp_bootstrap_pagination') )
    wp_bootstrap_pagination();
  ?>
  <!-- Posts -->

  <?php get_sidebar(); ?>

</div>
</div>
<!-- Fim Container -->

<?php get_footer(); ?>
