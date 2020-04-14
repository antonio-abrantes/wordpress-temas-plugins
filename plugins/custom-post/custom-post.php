<?php

/*
Plugin Name: Custom Post Type
Plugin URI: https://antonio-abrantes.github.io/
Description: Meu primeiro plugin WordPress
Author: Antonio Abrantes
Version: 1.4
Licence: GPL2+
*/

add_action('init', 'registrar_custom_post_type');

function registrar_custom_post_type(){

	$descritivos = [
		'name'=> 'Cursos',
		'singular_name'=> 'Curso',
		'add_new' => 'Adicionar novo Curso',
		'add_new_item'=>'Adicionar Curso',
		'edit_item'=>'Editar Curso',
		'new_item'=>'Novo Curso',
		'view_item'=>'Ver Curso',
		'search_items'=>'Procurar Cursos',
		'not_found'=>'Nenhum curso encontrado',
		'not_found_in_trash'=>'Nenhum curso na lixeira',
		'parent_item_colon'=>'',
		'menu_name'=> 'Cursos Plugin'
	];

	$args = [
		'labels'=> $descritivos,
		'public'=> true,
		'hierarchical'=> false,
		'menu_position' => 5,
		'supports' => ['title', 'editor', 'thumbnail', 'custom-fields', 'revisions']
	];

	register_post_type('cursos', $args);
	flush_rewrite_rules();

	registrar_taxonomia_tecnologia();
	registrar_taxonomia_tipo();

}

function registrar_taxonomia_tecnologia(){

	$descritivos = [
		'name'=> 'Tecnologias',
		'singular_name'=> 'Tecnologia',
		'add_new' => 'Adicionar nova Tecnologia',
		'add_new_item'=>'Adicionar Tecnologias',
		'edit_item'=>'Editar Tecnologia',
		'new_item_name'=>'Nova Tecnologia',
		'view_item'=>'Ver Tecnologia',
		'search_items'=>'Procurar Tecnologias',
		'not_found'=>'Nenhum Tecnologia encontrado',
		'menu_name'=> 'Tecnologias'
	];

	$args = [
		'labels'=> $descritivos,
		'singular_label'=>'Tecnologia',
		'hierarchical'=> true
	];

	register_taxonomy(
		'tecnologias',
		'cursos',
		$args
	);
}


function registrar_taxonomia_tipo(){

	$descritivos = [
		'name'=> 'Tipos',
		'singular_name'=> 'Tipo',
		'add_new' => 'Adicionar novo Tipo',
		'add_new_item'=>'Adicionar Tipo',
		'edit_item'=>'Editar Tipo',
		'new_item_name'=>'Novo Tipo',
		'view_item'=>'Ver Tipo',
		'search_items'=>'Procurar Tipo',
		'not_found'=>'Nenhum Tipo encontrado',
		'menu_name'=> 'Tipos'
	];

	$args = [
		'labels'=> $descritivos,
		'singular_label'=>'Tipo',
		'hierarchical'=> false
	];

	register_taxonomy(
		'tipo',
		'cursos',
		$args
	);
}

// Trabalhando com imagens
add_theme_support('post-thumbnails');

add_image_size('curso-miniatura', 150, 135, true);
add_image_size('slide-home', 458, 254, true);

// Metabox
add_action('add_meta_boxes', 'add_metabox_carga_horaria');

function add_metabox_carga_horaria(){
	add_meta_box(
	  'carga_horaria',
	  'Carga Horária',
	  'mb_carga_horaria_cb',
	  'cursos',
	  'side',
	  'default',
	  'Argumentos_callback'
	);
}

function mb_carga_horaria_cb(){
	global $post;
	$carga_horaria = get_post_meta($post->ID, 'carga_horaria', true);

	echo '<label for="carga_horaria">Carga Horaria: </label>';
	echo '<input type="text" name="carga_horaria" id="carga_horaria" value="'.esc_attr($carga_horaria).'">';
}

add_action('save_post', 'save_carga_curso');

function save_carga_curso(){
	global $post;
	$carga_horaria = sanitize_text_field($_POST['carga_horaria']);

	update_post_meta($post->ID, 'carga_horaria', $carga_horaria);
}

require_once('dashboard-widget.php');