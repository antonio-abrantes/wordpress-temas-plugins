<?php get_header(); ?>

  <div id="primary">
    <div id="main">
      <div class="container">

        <h2>Search results for: </h2><?php echo get_search_query(); ?>
        <?php
          get_search_form();

          while(have_posts()):
            the_post();
            get_template_part('template-parts/content', 'search');

            if(comments_open() || get_comments_number()):
              comments_template();
            endif;

          endwhile;

          the_posts_pagination(
            array(
              'screen_reader_text'=>'>',
              'prev_text'=> 'Previous',
              'next_text'=> 'Next'
            )
          );

        ?>

      </div>
    </div>
  </div>

<?php get_footer(); ?>