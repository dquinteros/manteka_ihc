<!DOCTYPE html>
<html lang="en">
<?php
	echo $head						//Esta variable es pasada como par�metro a esta vista
?>
<body>
		
		<?php
			echo $banner_portada	//Esta variable es pasada como par�metro a esta vista
		?>
		<div class="row-fluid">
			<div class="span7 offset1">
				<h2>Bienvenido a ManteKA</h2>
				ManteKA es un sistema que le permite mantener una comunicaci�n precisa y fluida con los participantes de la asignatura de Comunicaci�n Efectiva perteneciente al m�dulo b�sico de ingenier�a. <br>
				A trav�s de ManteKA es posible env�ar correos electr�nicos masivos mediante los filtros que se proporcionan. <br>
				Basta de enviar correos uno por uno! :)
			</div>
			<div class="span4">
				<?php echo form_open('php/login/'); ?>
						<div class="control-group">
							<label class="control-label" for="inputRut">Rut</label>
							<div class="controls">
							  <input type="text" name="inputRut" id="inputRut" placeholder="Ingrese rut, ejemplo: 175657436" value="<?= set_value('inputPassword'); ?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">Contrase�a</label>
							<div class="controls">
								<input type="password" name="inputPassword" id="inputPassword" placeholder="Ingrese su contrase�a" value="<?= set_value('inputPassword'); ?>">
								<div class="LoginUsuariosError"><?= form_error('passwordlogin');?></div>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<label class="checkbox">
									<input type="checkbox"> Recordarme
								</label>
								<button type="submit" class="btn">Iniciar Sesi�n</button>
							</div>
						</div>
					
			</div>
		</div>
		
</body>
</html>