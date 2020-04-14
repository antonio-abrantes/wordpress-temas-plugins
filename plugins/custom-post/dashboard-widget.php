<?php

add_action('wp_dashboard_setup', 'curso_dashboard_widget');

function curso_dashboard_widget(){
	wp_add_dashboard_widget(
	  'wp_curso_deshboard_widget',
	  'Detalhes dos Cursos',
	  'wp_curso_deshboard_widget_cb'
	);
}

function wp_curso_deshboard_widget_cb(){
	// echo "Conteúdo do Dashboard Widget";
	$cursos = new WP_Query([
		'post_type' => 'cursos',
		'posts_per_page' => 3
	]);

	while ($cursos->have_posts()) {
		
		$cursos->the_post();

	?>
		<a href="<?= the_permalink(); ?>" title="<?= the_title(); ?>">
			<?= the_title(); ?>
		</a><br>

	<?php		
	}
	$total = new WP_Query([
		'post_type'=> 'cursos'
	]);

	echo "Cursos cadastrados: ". $total->post_count."<br>";
}