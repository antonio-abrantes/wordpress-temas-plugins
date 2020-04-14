<article>
<h2><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h2>
  <?php the_post_thumbnail( array(275,275)); ?>
  <?php the_author_posts_link()?></p>
  <p>Categories: <?php the_category( ' ' );  ?></p>
  <p><?php the_tags('Tags: ', ',');  ?></p>
  <?php the_content();  ?>
</article>