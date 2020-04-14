<?php

/*
Plugin Name: WpDb e dbdelta
Plugin URI: https://antonio-abrantes.github.io/
Description: Meu primeiro plugin WordPress
Author: Antonio Abrantes
Version: 1.4
Licence: GPL2+
*/

register_activation_hook(__FILE__, 'criar_tabelas');

function criar_tabelas(){

	global $wpdb;
	$nome_tabela = $wpdb->prefix . 'aluno';

	$sql = 'CREATE TABLE '. $nome_tabela . '(
		cod_aluno INT NOT NULL,
		nome VARCHAR(100) NOT NULL,
		email VARCHAR(100) NOT NULL,
		endereco VARCHAR(150) NOT NULL
	);';

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);

}

add_action('admin_menu', 'registrar_submenu');

function registrar_submenu(){

	add_menu_page(
	  'Pagina de Configuração',
	  'Configuração do plugin dbdelta',
	  'manage_options',
	  'menu_slug_config',
	  'menu_slug_config_cb',
	  'dashicons-hammer',
	  9
	);

	do_action('tw_add_menu');
}

function menu_slug_config_cb(){
	echo '<h1>Página de configuração das querys sql</h1><br>';

	global $wpdb;

	/* Métodos de inserção */
	//Método menos recomendado
	// $wpdb->query('INSERT INTO wp_aluno(cod_aluno, nome, email, endereco)
	// 		VALUES (1, "Antonio", "antonio@hotmail.com", "Sousa, 09");
	// 	');

	//Método com query parametrizada
	// $wpdb->query(
	// 	$wpdb->prepare(
	// 		'INSERT INTO wp_aluno(cod_aluno, nome, email, endereco) VALUES (%d, %s, %s,%s)',
	// 		[2, 'Ana', 'ana@hotmail.com', 'Sousa, 120']
	// 	)
	// );

	// $wpdb->insert(
	// 	'wp_aluno',
	// 	[
	// 		'cod_aluno'=> 3,
	// 		'nome'=> 'Fulano',
	// 		'email'=> 'fulano@gmail.com',
	// 		'endereco'=> 'Cajazeiras, 177'
	// 	],
	// 	['%d', '%s', '%s', '%s']
	// );

	/* Métodos de consulta de dados */
	// $dados = $wpdb->get_results('SELECT * FROM wp_aluno', OBJECT_K );
	// var_dump($dados);

	// OBJECT – Objeto com arrays que representam cada linha com índices numéricos;
	// OBJECT_K – Objeto com array que representa cada linha com índice associativo;
	// ARRAY_A – Array com índices de linhas e colunas associativos;
	// ARRAY_N – Array com índices de linhas e colunas numéricos.

	// $dados = $wpdb->get_row('SELECT * FROM wp_aluno', OBJECT, 0); 
	// var_dump($dados);

	// $dados = $wpdb->get_row(
	// 	$wpdb->prepare(
	// 		'SELECT * FROM wp_aluno WHERE cod_aluno = %d', 3
	// 	)
	// );
	// var_dump($dados);

	/* Métodos de atualização de deleção de dados */
	// $wpdb->update(
	// 	'wp_aluno',
	// 	[
	// 		'nome' => 'Antonio Abrantes',
	// 		'email' => 'antonio@hotmail.com'
	// 	],
	// 	[
	// 		'cod_aluno' => 1
	// 	],
	// 	['%s', '%s'],
	// 	['%d']
	// );

	$wpdb->delete(
		'wp_aluno',
		[
			'cod_aluno' => 3
		],
		['%d']
	);
}