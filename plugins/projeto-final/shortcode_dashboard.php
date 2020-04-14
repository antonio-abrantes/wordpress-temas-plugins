<?php

add_shortcode('tw_anuncios', 'tw_anuncios_cb');

function tw_anuncios_cb() {

	// echo "Anúncio aqui 123";
	anuncios::mostrar('post', 1);

}