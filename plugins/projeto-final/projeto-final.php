<?php 

/* 
 * Plugin Name: Projeto Final 
 * Plugin URI: https://antonio-abrantes.github.io/
 * Description: Plugin de Propagandas para wordPress
 * Author: Antonio Abrantes
 * Version: 1.0
 * Licence: GPL2+
 * Text Domain: projeto-final
 */


//Guarda o caminho para o arquivo principal do plugin 
define('ARQ_PRINCIPAL', __FILE__); 
 
//Guarda a versão da tabela que usaremos de log 
define('V_TAB_ANUNCIO_LOG', '0.0.1'); 
 
//responsável por criar a tabela ao ativar o plugin 
require_once('instalacao.php'); 
 
//Configurações para criação do Custom Post anuncio e a metabox tipo 
require_once('custom_post.php'); 
 
//Contém a função que busca os anúncios e exibe 
require_once('acesso_banco.php'); 
 
//Responsável pela criação e exição do Widget 
require_once('widget.php'); 
 
//Contém a criação do Shortcode e do dashboard Widget 
require_once('shortcode_dashboard.php');