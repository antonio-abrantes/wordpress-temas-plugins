<?php get_header(); ?>

<img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="">

<div class="content-area">
  <main>

    <section class="middle-area">
      <div class="container">
        <div class="row">

          <div class="error-404 text-justify">

            <header>
              <h1>Page not found</h1>
              <p>Page not exist on this site!</p>
              <?php $template_directory = get_template_directory_uri(); ?>
              <div>
                <img src="<?php echo esc_url(home_url('/')); ?>/wp-content/uploads/2020/01/404.gif" alt="">
                <!-- <?php bloginfo('name'); ?>   -->
              </div>
            </header>

            <div class="error">
              <p>How about doing a search?</p>
              <?php get_search_form(); ?>

              <?php the_widget('WP_Widget_Recent_Posts', array(
                'title' => 'Letest Posts',
                'number' => 2
              )); ?>

              <?php  ?>

            </div>

          </div>

        </div>
      </div>
    </section>
  </main>
</div>

<?php get_footer(); ?>