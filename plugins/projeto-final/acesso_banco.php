<?php

/**
* 
*/
class anuncios
{
	
	static function mostrar($tipoAnuncio, $qtdAnuncios)
	{
		$resultado = self::filtrar($tipoAnuncio, $qtdAnuncios);

		self::listar($resultado);
	}

	static function filtrar($tipoAnuncio, $qtdAnuncios)
	{
		return new WP_Query([
			'post_type' => 'anuncio',
			'meta_query' => [
				[
					'key' => 'tipo_anuncio',
					'value' => $tipoAnuncio
				]
			],
			'orderby' => 'rand',
			'posts_per_page' => $qtdAnuncios
		]);
	}

	static function listar($anuncios)
	{
		while ($anuncios->have_posts()) {
			$anuncios->the_post();

			$link_anuncio = get_post_meta($anuncios->post->ID, 'link_anuncio', true);

			$imagem_url = wp_get_attachment_url(get_post_thumbnail_id());

			echo '<a href="' . $link_anuncio . '" target="_blank">';

			echo '<img src="' . $imagem_url . '" style="margin-top: 5px;" />';

			echo '</a>';

		}
	}
}
















