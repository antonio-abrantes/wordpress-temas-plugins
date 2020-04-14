<?php 

/* 
 * Plugin Name: Tradução Plugin 
 * Plugin URI: https://antonio-abrantes.github.io/
 * Description: Meu primeiro plugin WordPress
 * Author: Antonio Abrantes
 * Version: 1.4
 * Licence: GPL2+
 * Text Domain: traducao
 */

  add_action('plugins_loaded', 'registrar_dominio');

  function registrar_dominio(){
    load_plugin_textdomain('traducao-tw', false, dirname(plugin_basename(__FILE__)).'/lang/' );
  }

  add_action('admin_menu', 'registrar_submenu'); 

  function registrar_submenu() { 

    add_menu_page( 
      'Página Traduzida', 
      'Página Traduzida', 
      'manage_options', 
      'menu_plug_traducao', 
      'menu_plug_traducao_cp', 
      'dashicons-hammer', 
      9 
    ); 
  } 

  function menu_plug_traducao_cp(){ 

   echo "<h1>";

   _e('Hello World', 'traducao-tw');

   echo "</h1>";

   $string = __('This plugin is in English', 'traducao-tw');

   echo "<p>" . $string . '</p>';

 }
