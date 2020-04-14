<article>
<h2><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h2>
  <?php the_author_posts_link()?></p>
  
  <?php if(has_category()): ?>
    <p>Categories: <?php the_category( ' ' );  ?></p>
  <?php endif; ?>

  <p><?php the_tags('Tags: ', ',');  ?></p>
  <?php the_excerpt();  ?>
</article>