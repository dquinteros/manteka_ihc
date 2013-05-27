<?php
/**
* Este Archivo corresponde al cuerpo central de la vista crear coordinadores en el proyecto Manteka.
*
* @package    Manteka
* @subpackage Views
* @author     Grupo 2 IHC 1-2013 Usach
*/
?>
<fieldset>
	<legend>Agregar Coordinador</legend>
		<div class="span7">
		<div class="span12">
			<h4>Complete los siguientes datos para agregar un coordinador:</h4><br/>
				<?php
					$attributes = array('onSubmit' => 'return validar(this)', 'class' => 'span9');
					echo form_open('Coordinadores/agregarCoordinadores', $attributes);
				?>
				<br/>
				<table>
					<tr>
					<td><h6><span class="text-error">(*)</span>Nombre completo:</h6></td>
					<td><input class ="input-xlarge" name='nombre' type="text" placeholder="ej:SOLAR FUENTES MAURICIO IGNACIO" required></td>
					</tr>
					<tr>
					<td><h6><span class="text-error">(*)</span>Rut :</h6></td>
					<td><input class ="input-xlarge" name='rut' type="text" placeholder="ej:5946896-3" required pattern="([0-9]{8}|[0-9]{7})-([0-9]{1}|k)" ></td>
					</tr>			
					<tr>
					<td><h6><span class="text-error">(*)</span>Contraseña:</h6></td>
					<td><input class ="input-xlarge" name='contrasena'  type="password" placeholder="*******" required></td>
					</tr>
					<tr>
					<td><h6><span class="text-error">(*)</span>Confirmar contraseña:</h6></td>
					<td><input class ="input-xlarge" name='contrasena2' type="password" placeholder="*******" required></td>
					</tr>
					<tr>
					<td><h6><span class="text-error">(*)</span>Correo 1:</h6></td>
					<td><input class ="input-xlarge" name='correo1' type="email" placeholder="ej:edmundo.leiva@usach.cl" required ></td>
					</tr>
					<tr>
					<td><h6>Correo 2:</h6></td>
					<td><input class ="input-xlarge" name='correo2' type="email" placeholder="ej:edmundo.leiva@gmail.com"></td>
					</tr>
					<tr>
					<td><h6><span class="text-error">(*)</span>Teléfono:</h6></td>
					<td><input class ="input-xlarge" name='fono' type="text" placeholder="ej:9-87654321" required></td>
					</tr>
					<tr>
					<td></td>
					<td>Los campos con <span class="text-error">(*)</span> son obligatorios</td>
					</tr>
				</table>
				<br />
				<div class="span6 offset6">
					<button class="btn" type="submit">Agregar</button>
					<a class="btn" href="/manteka/index.php/Coordinadores/verCoordinadores/" type="button">Cancelar</a>
				</div>
			<?php echo form_close(""); ?>
		</div>
	</div>	
</fieldset>


<script type="text/javascript">
function validar(form){
	if ($('input[name="contrasena"]').val() != $('input[name="contrasena2"]').val()) {
		alert("Las contrase?as no coinciden.");
		return false;
	}else{
		return true;
	};
}

</script>