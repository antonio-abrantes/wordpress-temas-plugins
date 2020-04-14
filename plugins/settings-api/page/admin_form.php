<form action="options.php" method="post">

	<?php wp_nonce_field('options_plug_config', 'campo_nonce'); ?>

	<table class="form-table">
		<?php do_settings_sections('PO_dados_registro'); ?>
		<?php settings_fields('PO_dados_registro'); ?>
		<?php submit_button(); ?>
	</table>
</form>