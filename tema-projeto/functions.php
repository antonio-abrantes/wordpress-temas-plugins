<?php

// Register Custom Navigation Walker
require_once('wp_bootstrap_pagination.php');

add_action('wp_enqueue_scripts', 'twtema_add_script_cabecalho');

function twtema_add_script_cabecalho(){
	//Adiconar estilos
	wp_enqueue_style('bootstrap-twtema', get_stylesheet_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('style-twtema', get_stylesheet_directory_uri() . '/css/style.css');

	//Adicionar scripts
	wp_enqueue_script('modernizr-twtema', get_stylesheet_directory_uri() . '/js/modernizr.js');
}

add_action('wp_footer', 'twtema_add_script_rodape');

function twtema_add_script_rodape(){
	// wp_enqueue_script('bootstrap-twtema', get_stylesheet_directory_uri() . '/js/bootstrap.js', 
	// 	['jquery']);
	wp_enqueue_script('jquery-twtema', get_stylesheet_directory_uri() . '/js/jquery.js');
	wp_enqueue_script('bootstrap-twtema', get_stylesheet_directory_uri() . '/js/bootstrap.min.js',
	 ['jquery-twtema']);
}

add_action('init', 'twtema_action_init'); //Adiconar menu dinamico no header.php

function twtema_action_init(){
	register_nav_menu('twmenu-principal', 'Menu principal (cabeçalho)');
	register_nav_menu('twmenu-rodape', 'Menu rodape');

	//Chamada a função que registra o custom post
	twtema_registrar_custom_post_type();
}

register_sidebar(
	array(
		'name' => 'Barra Lateral (Sidebar)',
		'id' => 'tw-sidebar',
		'description' => 'Descrição da sidebar',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	)
);

function twtema_registrar_custom_post_type(){

	// $descritivos = array(
	// 	'name' => 'Cursos',
	// 	'singular_name' => 'Curso',
	// 	'add_new' => 'Adicionar novo Curso',
	// 	'add_new_item' => 'Adicionar Curso',
	// 	'edit_item' => 'Editar Curso',
	// 	'new_item' => 'Novo Curso',
	// 	'view_item' => 'Ver Curso',
	// 	'search_items' => 'Procurar Curso',
	// 	'not_found' => 'Nenhum curso encontrado',
	// 	'not_found_in_trash' => 'Nenhum Curso na Lixeira',
	// 	'parent_item_colon' => '',
	// 	'menu_name' => 'Cursos'
	// );

	// $args = array(
	// 	'labels' => $descritivos,
	// 	'public' => true,
	// 	'hierarchical' => false,
	// 	'menu_position' => 5,
	// 	'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'revisions')
	// );

	// register_post_type('cursos', $args);

	// $descritivosBanner = array(
	// 	'name' => 'Banner',
	// 	'singular_name' => 'Banner',
	// 	'add_new' => 'Adicionar novo Banner',
	// 	'add_new_item' => 'Adicionar Banner',
	// 	'edit_item' => 'Editar Banner',
	// 	'new_item' => 'Novo Banner',
	// 	'view_item' => 'Ver Banner',
	// 	'search_items' => 'Procurar Banner',
	// 	'not_found' => 'Nenhum Banner encontrado',
	// 	'not_found_in_trash' => 'Nenhum Banner na Lixeira',
	// 	'parent_item_colon' => '',
	// 	'menu_name' => 'Banner'
	// );

	// $argsBanner = array(
	// 	'labels' => $descritivosBanner,
	// 	'public' => true,
	// 	'hierarchical' => false,
	// 	'menu_position' => 5,
	// 	'supports' => array('title', 'thumbnail')
	// );

	// register_post_type('banners', $argsBanner);

	// flush_rewrite_rules();
}

// add_theme_support('post-thumbnails');

// add_image_size('curso-miniatura', 150, 135, true);
// add_image_size('slide-home', 458, 254, true);

add_action('pre_get_posts', 'twtema_filtro_loop_principal');

function twtema_filtro_loop_principal($query){
	if($query->is_main_query() && $query->is_home()){
		$query->set('ignore_sticky_posts', true);
	}
}

function customize_wp_bootstrap_pagination($args) {
    
    $args['previous_string'] = 'Anterior';
    $args['next_string'] = 'Proximo';
    
    return $args;
}
add_filter('wp_bootstrap_pagination_defaults', 'customize_wp_bootstrap_pagination');

add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'status', 'video'));

add_theme_support('title-tag');

add_theme_support('customize-selective-refresh-widgets');

add_theme_support('custom-logo', [
	'height' => 50,
	'width' => 150,
	'flex-width' => true
]);


add_action( 'customize_register', 'twtema_decricoes_do_header' );

function twtema_decricoes_do_header($wp_customize) {
	// adiciona um painel
	$wp_customize->add_panel( 'twtema_descricoes', [
		'priority' => 500,
		'theme_supports' => '',
		'title' => 'Descrições do tema',
		'description' => 'Descrições usadas dentro do tema',
	]);

	// adiciona uma sessão
	$wp_customize->add_section( 'twtema_descricoes_header' , [
		'title' => 'Descrições do header',
		'panel' => 'twtema_descricoes',
		'priority' => 10
	]);

	// Adiciona setting
	$wp_customize->add_setting( 'twtema_descricoes-header-titulo', [
		'default' => 'Tema Projeto',
	]);

	// Adicionar control
	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize,
			'twtema_descricoes_header_control',
			[
				'label' => 'Título do tema',
				'section' => 'twtema_descricoes_header',
				'settings' => 'twtema_descricoes-header-titulo',
				'type' => 'text'
			]
		)
	);
}

