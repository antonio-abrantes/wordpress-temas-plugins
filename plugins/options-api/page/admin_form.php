<form action="" method="post">
	<h1>Configurações do plugin</h1>

	<?php wp_nonce_field('options_plug_config', 'campo_nonce'); ?>

	<table class="form-table">
		<tr valign="top">
			<th scope="row">
				<label for="tablecell">Nome: </label>
			</th>
			<td>
				<input type="text" name="nome" class="regular-text" value="<?= esc_attr(get_option('PO_Nome', '')); ?>"	>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row">
				<label for="tablecell">E-mail: </label>
			</th>
			<td>
				<input type="text" name="email" class="regular-text" value="<?= esc_attr(get_option('PO_Email', '')); ?>">
			</td>
		</tr>
		<tr valign="top">
			<th scope="row">
				<label for="tablecell">API Key: </label>
			</th>
			<td>
				<input type="text" name="apikey" class="regular-text" value="<?= esc_attr(get_option('PO_Apikey', '')); ?>">
			</td>
		</tr>
		<tr valign="top">
			<th scope="row">
				<label for="tablecell">Tipo de licença: </label>
			</th>
			<td>
				<select name="licenca" >
					<option 
							value="basica" <?= selected(get_option('PO_Licenca'), 'basica'); ?>>Básica</option>
					<option 
							value="intermediaria" <?= selected(get_option('PO_Licenca'), 'intermediaria'); ?> >Intermediária</option>
					<option 
							value="avancada" <?= selected(get_option('PO_Licenca'), 'avancada'); ?> >Avançada</option>
				</select>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row">
				<label for="tablecell">API Key: </label>
			</th>
			<td>
				<input class="button-primary" type="submit" name="PO_submit" value="Salvar">
			</td>
		</tr>
	</table>
</form>