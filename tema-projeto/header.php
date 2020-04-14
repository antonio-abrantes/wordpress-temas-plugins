<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<!--  <title><?php bloginfo('name'); ?></title> -->

	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="<?php bloginfo('admin_email'); ?>">

	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,user-scalable=1" /> 

	<!-- Estilos -->
	
	<?php wp_head(); ?>
</head>

<!-- Topo -->
<header class="navbar navbar-default topo" >
	<nav class="container-fluid container-topo" role="navigation">
		<div class="container">
			<div class="navbar-header" >
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php bloginfo('home'); ?>">
					<?php 
					if(function_exists('the_custom_logo')){
						the_custom_logo();
					}else{
						echo "Nome do Blog";
					}
					?> 
				</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<?php wp_nav_menu([
						'theme_location'=>'twmenu-principal',
						'container'=>'ul',
						'menu_class'=>'nav navbar-nav'
						]); ?>
<!-- 	        	<?php wp_list_pages([
	        			'post_type'=>'page',
	        			'title_li'=>'',
	        			'sort_column'=>'post_date',
	        			'sort_order'=>'ASC'
	        			]); ?> -->
	          <!-- <li><a href="#">Home</a></li>
	          <li><a href="#">Blog</a></li>
	          <li><a href="#">Sobre</a></li>
	          <li><a href="#">Contato</a></li> -->
	      </ul>

	      <!-- form-search -->
	      <?php get_search_form(); ?>

	      <ul class="nav navbar-nav navbar-right">
	      	<li class="dropdown">
	      		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu <span class="caret"></span></a>
	      		<ul class="dropdown-menu" role="menu">
	      			<li><a href="#">Item 1</a></li>
	      			<li><a href="#">Item 2</a></li>
	      			<li><a href="#">Item 3</a></li>
	      			<li class="divider"></li>
	      			<li><a href="#">Item separado</a></li>
	      		</ul>
	      	</li>
	      </ul>
	  </div>
	</div>
</nav>
</header>
<!-- Topo -->


<!-- Chamada principal -->
<main class="main row-fluid" role="main">
	<div class="container container-main clearfix">
		<div class="hero-unit col-md-12">
			<h1><?php echo get_theme_mod('twtema_descricoes-header-titulo'); ?></h1>
			<p><?php echo bloginfo('description'); ?></p>
		</div>
	</div>
</main>
