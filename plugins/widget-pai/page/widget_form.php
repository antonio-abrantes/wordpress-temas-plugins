<p>
	<label for="<?= $this->get_field_id('titulo') ?>">Título</label>
	<input type="text" name="<?= $this->get_field_name('titulo') ?>" id="<?= $this->get_field_id('titulo') ?>" 
			class="widefat" value="<?= esc_attr($titulo) ?>">
</p>
<p>
	<label for="<?= $this->get_field_id('titulo_link') ?>">Título do Link</label>
	<input type="text" name="<?= $this->get_field_name('titulo_link') ?>" id="<?= $this->get_field_id('titulo_link') ?>" 
			class="widefat" value="<?= esc_attr($titulo_link) ?>">
</p>
<p>
	<label for="<?= $this->get_field_id('link') ?>">Link</label>
	<input type="text" name="<?= $this->get_field_name('link') ?>" id="<?= $this->get_field_id('link') ?>" 
			class="widefat" value="<?= esc_attr($link) ?>">
</p>