<?php
//echo "Teste do arquivo functions.php";

// add_action('wp_head', 'alerta_cb');

// function alerta_cb(){
// 	echo "<meta description='teste do blog conceito' />";
// }

add_action('pre_get_posts', 'remove_cat_1');

function remover_cat_1($query){
	if($query->id_main_query() && $query->is_home()){
		$query->set('cat', '-1');
	}
}