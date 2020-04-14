<?php

/*
Plugin Name: Segundo Plugin
Plugin URI: https://antonio-abrantes.github.io/
Description: Meu primeiro plugin WordPress
Author: Antonio Abrantes
Version: 1.0
Licence: GPL2+
*/

// add_action('wp_before_admin_bar_render', 'alerta_cb');

add_action('wp_after_admin_bar_render', 'alerta_cb');

// function alerta_cb(){
// 	echo "<script>alert('Antes da barra administrativa');</script>";
// 	exit;
// }

function alerta_cb(){
	echo "<h1>Antonio Abrantes</h1>";
}

add_filter('the_post', 'add_title');

function add_title($post){
	$post->post_title = "POST: ". $post->post_title;

	return $post;
}