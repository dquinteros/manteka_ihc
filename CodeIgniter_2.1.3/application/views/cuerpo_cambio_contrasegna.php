
<fieldset>
	<legend>Cambiar contrase�a</legend>
	
	
	<?php echo form_open('Login/cambiarContrasegnaPost'); ?>
	<div class="error"> 
		<label>Nombre de usuario</label>
		<input type="text" placeholder="<?php echo $rut_usuario ?>" value="<?php echo $rut_usuario ?>" disabled>
		
		<label>Contrase�a actual</label>
		<?php echo form_error('contrasegna_actual'); ?>
		<input type="text" name="contrasegna_actual" value="<?php echo set_value('contrasegna_actual'); ?>">
		
		<label>Nueva contrase�a</label>
		<?php echo form_error('nva_contrasegna'); ?>
		<input type="text" name="nva_contrasegna" value="<?php echo set_value('nva_contrasegna'); ?>">
		
		<label>Repita su nueva contrase�a</label>
		<?php echo form_error('nva_contrasegna_rep'); ?>
		<input type="text" name="nva_contrasegna_rep" value="<?php echo set_value('nva_contrasegna_rep'); ?>">
		
		<div>
			<button type="submit" class="btn">Cambiar contrase�a</button>
		</div>
	</div>
	
</fieldset>