
<?php get_header(); ?>

 <!-- Container -->
  <div class="container">

    <div class="row-fluid">

      <!-- Posts -->
      <div class="col-sm-9 blog-main" itemscope itemtype="http://schema.org/Article">

        <h2>Resultado para "<?php echo esc_html(get_query_var('s')); ?>"</h2>

		<!-- posts -->
		<?php get_template_part('/includes/loop', 'principal'); ?>

      </div>
      <!-- Posts -->

      <?php get_sidebar(); ?>

    </div>
  </div>
  <!-- Fim Container -->

<?php get_footer(); ?>