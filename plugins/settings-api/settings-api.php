<?php

/*
Plugin Name: Settings API
Plugin URI: https://antonio-abrantes.github.io/
Description: Meu primeiro plugin WordPress
Author: Antonio Abrantes
Version: 1.4
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
	require_once('page/admin_form.php');
}


add_action('admin_init', 'add_sections_and_fields_cb');

function add_sections_and_fields_cb(){
	add_settings_section(
		'section_principal',
		'Configurações de Registro',
		'exibe_section_plug_cb',
		'PO_dados_registro'
	);

	register_setting(
		'PO_dados_registro',
		'PO_dados_registro'
	);

	add_settings_field(
		'PO_Nome',
		'Nome',
		'input_nome_cb',
		'PO_dados_registro',
		'section_principal',
		['teste']
	);
}

function exibe_section_plug_cb(){
	echo "<h4>Dados de registro do plugin</h4>";
}

function input_nome_cb(){
	$config = get_option('PO_dados_registro');

	$PO_Nome = isset( $config['PO_Nome'] ) ? $config['PO_Nome'] : '';
	
	echo '<input class="regular-text" name="PO_dados_registro[PO_Nome]" 
	value="'.esc_attr($PO_Nome).'" type="text" >';
}

//Adiciona configuação a página existente no Wordpress

add_action('admin_init', 'add_sections_and_fields_config_cb'); 
 
function add_sections_and_fields_config_cb() { 
 
add_settings_section( 
        'treinaweb_plugin_section', 
        'Opções Treinaweb Plugin', 
        'exibe_section_plug_config_cb', 
        'general' 
    ); 
 
add_settings_field( 
        'treinaweb_config', 
        'Configuração Treinaweb', 
        'input_treinaweb_config_cb', 
        'general', 
        'treinaweb_plugin_section' 
    ); 
 
register_setting( 
      'general', 
      'treinaweb_config' 
  ); 
} 
 
function exibe_section_plug_config_cb() { 
	echo '<p class="description">Seção Personalizada</p>'; 
} 
 
function input_treinaweb_config_cb() { 
    $config = get_option( 'treinaweb_config' ); 
 
	echo '<input class="regular-text" name="treinaweb_config" value="' .  $config  . '" type="text">'; 
}