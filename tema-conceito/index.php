<!DOCTYPE html>
<html class="no-js">
<head>
	<title>Tema Conceito</title>
	<?php wp_head(); ?>
</head>
<body>
	<h2>Bem vindos meu Tema TW</h2>
	
	<!-- <?php $php_actions = new WP_Query( 'category_name=php&tag=actions' ); ?> -->
	<?php $php_actions = new WP_Query('cat=2'); ?>
	<div>
		<?php while( $php_actions->have_posts() ) : $php_actions->the_post(); ?>
			<div style="border: 1px solid black">
				<h3><?php echo get_the_title(); ?></h3>
				<p><?php the_excerpt(); ?></p>
				<?php the_category(); ?>
				<?php the_date(); ?>
				<?php the_time(); ?>
			</div>
		<?php endwhile; ?>
	</div>

	<hr>
 	<div>
		<?php while( have_posts() ) : the_post(); ?>
			<div style="border: 1px solid black">
				<h3><?php echo get_the_title(); ?></h3>
				<p><?php the_excerpt(); ?></p>
				<?php the_category(); ?>
				<?php the_date(); ?>
				<?php the_time(); ?>
			</div>
		<?php endwhile; ?>
	</div>
	<hr>

<!-- 	<?php $cat_php = new WP_Query('cat=2'); ?>
	<div>
		<?php while( $cat_php->have_posts() ) : $cat_php->the_post(); ?>
			<div style="border: 1px solid black">
				<h3><?php echo get_the_title(); ?></h3>
				<p><?php the_excerpt(); ?></p>
				<?php the_category(); ?>
				<?php the_date(); ?>
				<?php the_time(); ?>
			</div>
		<?php endwhile; ?>
	</div> -->


	<?php wp_footer(); ?>

</body>
</html>