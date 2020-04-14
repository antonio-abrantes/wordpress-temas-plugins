<?php

/*
Plugin Name: Widget API
Plugin URI: https://antonio-abrantes.github.io/
Description: Meu primeiro plugin WordPress
Author: Antonio Abrantes
Version: 1.4
Licence: GPL2+
*/

add_action('widgets_init', 'registrar_widget');

function registrar_widget(){
	register_widget('SocialMediaWidget');
}

/**
* Classe para criação de widget
*/
class SocialMediaWidget extends WP_Widget
{
	
	  function __construct() {
		parent::__construct(
			'social_media_widget',
			'Social Media',
			['description' => 'Widget permiti criar link para redes sociais']
		);
	  }

	  public function widget( $args, $dados ) {
		echo $args['before_widget'];

		if(!empty($dados['titulo'])){
			echo $args['before_title'];
				echo apply_filters('widget_title', $dados['titulo']);
			echo $args['after_title'];
		}

		if(!empty($dados['titulo_link']) && !empty($dados['link'])){
			printf('<a href="%s" target="_blanck">%s</a>', $dados['link'], $dados['titulo_link']);
		}

		echo $args['after_widget'];
	  }

	  public function form( $dados ) {

	  	$titulo 		= isset($dados['titulo']) ? $dados['titulo'] : '';
	  	$titulo_link 	= isset($dados['titulo_link']) ? $dados['titulo_link'] : '';
	  	$link 			= isset($dados['link']) ? $dados['link'] : '';

		require('page/widget_form.php');
	  }


	  public function update( $dados_novos, $dados_antigos ) {
		// Caso queira tratar alguma informação antes de salvar
	  	$dados_novos['titulo'] = strip_tags($dados_novos['titulo']);
	  	$dados_novos['titulo_link'] = strip_tags($dados_novos['titulo_link']);
	  	$dados_novos['link'] = strip_tags($dados_novos['link']);
	  	
	  	return $dados_novos;
	  }
}