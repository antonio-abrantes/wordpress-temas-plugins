<?php

/*
Plugin Name: Menu Plugin Extensão
Plugin URI: https://antonio-abrantes.github.io/
Description: Plugin de extensão de configuração
Author: Antonio Abrantes
Version: 1.0
Licence: GPL2+
*/

add_action('tw_add_menu', 'tw_registrar_submenu_extensao');

function tw_registrar_submenu_extensao(){
	add_submenu_page(
		'options-general.php',
		'Página de extensão',
		'Menu Extensão',
		'manage_options',
		'smenu_slug_config_entensao',
		'smenu_slug_config__entensao_cb'
	);

	// do_action('tw_add_menu');

}

function smenu_slug_config__entensao_cb(){
	echo "<h1>Página de configuração menu extensão</h1>";
}