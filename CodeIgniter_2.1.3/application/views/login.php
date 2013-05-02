<!DOCTYPE html>
<html lang="en">
<?php
	echo $head						//Esta variable es pasada como parámetro a esta vista
?>
<body>
		
		<?php
			echo $banner_portada	//Esta variable es pasada como parámetro a esta vista
		?>
		<div class="row-fluid">
			<div class="span7 offset1">
				<h2>Bienvenido a ManteKA</h2>
				ManteKA es un sistema que le permite mantener una comunicación precisa y fluida con los participantes de la asignatura de Comunicación Efectiva perteneciente al módulo básico de ingeniería. <br>
				A través de ManteKA es posible enviar correos electrónicos masivos a las personas que usted requiere <br>
				Basta de enviar correos uno por uno! :)
			</div>
			<fieldset class="span3">
				<legend>Inicio de sesión</legend>
				<?php echo form_open('php/login/'); ?>
						<div class="control-group">
							<label class="control-label" for="inputRut">Rut</label>
							<div class="controls">
							  <input type="text" name="inputRut" id="inputRut" placeholder="Ingrese rut, ejemplo: 175657436" value="<?= set_value('inputPassword'); ?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">Contraseña</label>
							<div class="controls">
								<input type="password" name="inputPassword" id="inputPassword" placeholder="Ingrese su contraseña" value="<?= set_value('inputPassword'); ?>">
								<div class="LoginUsuariosError"><?= form_error('passwordlogin');?></div>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<label class="checkbox">
									<input type="checkbox"> Recordarme
									<a href="<?php echo site_url("Login/olvidoPass")?>">¿Olvidó su contraseña?</a>
								</label>
								<button type="submit" class="btn btn-primary">
									Entrar
								</button>					
							</div>
						</div>
				<?php echo form_close(""); ?>
				<?php echo form_open('php/signInGoogle/google'); ?>
						<div class="control-group">
							O puede entrar con su cuenta Gmail<br>

							<button type="submit" class="btn">
								Entrar con Gmail
							</button>
						</div>
				<?php echo form_close(""); ?>
			</fieldset>
		</div>
		
</body>
</html>