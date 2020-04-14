<?php get_header(); ?>
<h1>Teste 2</h1>
 <!-- Container -->
  <div class="container">

    <h2>Categoria PHP</h2>

    <div class="row-fluid">

      <!-- Posts -->
      <div class="col-sm-9 blog-main" itemscope itemtype="http://schema.org/Article">

		<!-- posts -->
		<?php get_template_part('/includes/loop', 'principal'); ?>

      </div>
      <h1>Teste</h1>
      <!-- Posts -->

      <?php get_sidebar(); ?>

    </div>
  </div>
  <!-- Fim Container -->

<?php get_footer(); ?>
