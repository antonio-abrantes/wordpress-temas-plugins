<?php

/*
Plugin Name: Options API
Plugin URI: https://antonio-abrantes.github.io/
Description: Meu primeiro plugin WordPress
Author: Antonio Abrantes
Version: 1.0
Licence: GPL2+
*/


add_action('admin_menu', 'registrar_menu');

function registrar_menu(){
	add_menu_page(
		'Pagina de Configuração',
		'Configurações plugin',
		'manage_options',
		'options_plug_config',
		'options_plug_config_cp',
		'dashicons-hammer',
		85
	);
}


function options_plug_config_cp(){
	echo "<h1>Página de configuração de Options API</h1>";

	// add_option('treinaweb_cursos', 'Curso plugins WordPress');

	echo get_option('treinaweb_cursos')."<br>";
	echo get_option('nao-existe', 'Valor Padrão')."<br>";

	// update_option('wordpress-plugin-t', 'Meu primeiro valor 12345')."<br>";
	update_option('valores-t', ['valor 1', 'valor 2', 'valor 3'])."<br>";

	echo get_option('wordpress-plugin-t')."<br>";

	delete_option('nome-chave');

}

