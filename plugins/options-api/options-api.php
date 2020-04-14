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

	if(isset($_POST['PO_submit'])){

		check_admin_referer('options_plug_config', 'campo_nonce');

		$nome = sanitize_text_field($_POST['nome']);
		$email = sanitize_email($_POST['email']);
		$apikey = sanitize_text_field($_POST['apikey']);
		$licenca = sanitize_text_field($_POST['licenca']);

		update_option('PO_Nome', $nome);
		update_option('PO_Email', $email);
		update_option('PO_Apikey', $apikey);
		update_option('PO_licenca', $licenca);
	}

	require_once('page/admin_form.php');

}

