<?php

/*
Plugin Name: Shortcode API
Plugin URI: https://antonio-abrantes.github.io/
Description: Meu primeiro plugin WordPress
Author: Antonio Abrantes
Version: 1.4
Licence: GPL2+
*/

// add_shortcode('tw_teste', 'tw_teste_cb');

// function tw_teste_cb( $attr, $content, $tag ){

// 	var_dump($attr);

// 	echo '<br>'.$content."<br>";

// 	echo $tag."<br>";
// }


add_shortcode('tw_endereco', ['TwEndereco', 'getEndereco']);

/**
* Classe para usar o shortcode
*/
class TwEndereco
{
	
	static function getEndereco($attr, $content, $tag)
	{
		$content = $content == '' ? '58800005' : $content ;

		$json = self::getJson($content);

		$array = self::getArray($json);

		extract( (array) $array);

		echo $address . ", " . $district . " - " . $city . " - " . $state;
	}

	static function getJson($content)
	{
		  // Inicia o cURL (uma transação HTTP) passando o CEP recebido 
		  $recurso = curl_init("https://apps.widenet.com.br/busca-cep/api/cep/{$content}.json"); 
		 
		  // Definido o que receber de conteúdo (GET) 
		  curl_setopt($recurso, CURLOPT_RETURNTRANSFER, true); 
		 
		  // Executa e obtém o resultado 
		  $resultado = curl_exec($recurso); 
		 
		  // Encerra a conexão (para liberar da memória) 
		  curl_close($recurso); 

		  return $resultado;
	}

	static function getarray($json)
	{
		  return json_decode($json);
	}
}