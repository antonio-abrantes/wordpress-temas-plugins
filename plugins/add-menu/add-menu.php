<?php

/*
Plugin Name: Menu Plugin
Plugin URI: https://antonio-abrantes.github.io/
Description: Plugin configuração do menu
Author: Antonio Abrantes
Version: 1.0
Licence: GPL2+
*/

//Ação de verificação ao ativar o plugin
define('VERSAO_REQUERIRA', '4.5.0');

register_activation_hook(__FILE__, 'plugin_ativacao');

function plugin_ativacao(){
	global $wp_version;

	if(version_compare($wp_version, VERSAO_REQUERIRA, '<')){
		wp_die('É necessaria a versão '. VERSAO_REQUERIRA. ' ou superior');
	}
}

//Ação de verificação ao desativar o plugin
register_deactivation_hook(__FILE__, 'plugin_desativacao');

function plugin_desativacao(){
	// wp_die('Não é permitido desativar');
}

//Ação ao desinstalar o plugin
register_uninstall_hook(__FILE__, 'plugin_desinstalado');

function plugin_desinstalado(){
	$file = fopen(WP_PLUGIN_DIR.'/uninstall.txt', 'a');

	$linha = "Plugin desinstalado com sucesso!";
	fwrite($file, $linha);
	fclose($file);
}

//Adicionar menus e submenus
add_action('admin_menu', 'registrar_submenu');

function registrar_submenu(){
	add_submenu_page(
		'options-general.php',
		'Página de configuração',
		'Menu Plugin',
		'manage_options',
		'smenu_slug_config',
		'smenu_slug_config_cb'
	);

	add_submenu_page(
		'themes.php',
		'Página de tema',
		'Menu Plugin',
		'edit_theme_options',
		'smenu_slug_theme',
		'smenu_slug_theme_cb'
	);

	add_menu_page(
	  'Pagina de Configuração',
	  'Configuração do plugin',
	  'manage_options',
	  'menu_slug_config',
	  'menu_slug_config_cb',
	  'dashicons-hammer',
	  9
	);

	do_action('tw_add_menu');

}

function smenu_slug_config_cb(){
	echo "<h1>Página de configuração menu plugin</h1>";
}

function smenu_slug_theme_cb(){
	echo "<h1>Página de configuração do tema</h1>";
}

function menu_slug_config_cb(){
	echo "<h1>Página de configuração do menu principal</h1><br>";
	echo "<h3>Informações do Blog</h3>";
	echo bloginfo() . "<br>";

	$teste = WP_CONTENT_DIR;
	echo "{$teste}<br>";
	$teste = WP_CONTENT_URL;
	echo "{$teste}";
	echo "<hr>";
	echo bloginfo('name') . "<br>";
	echo bloginfo('description') . "<br>";
	echo bloginfo('url') . "<br>";
	echo bloginfo('language') . "<br>";
	echo bloginfo('version') . "<br>";
}