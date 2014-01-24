<!-- Barra superior que contiene el nombre del usuario, el menu, cerrar sesión y botón de ayuda -->
		<p style="margin-left:20px;">
			Bienvenido(a) <?php echo $nombre_usuario; ?>
		</p>
		<div class="btn-group" style="margin-top:-10px; margin-left:20px;">
			<a class="btn btn-mini" href="<?php echo site_url("Correo/enviarCorreo") ?>" title="Enviar correo">
				<i class="icon-envelope"></i>
			</a>
			<a class="btn btn-mini" href="<?php echo site_url("User/datosUsuario") ?>" title="Perfil de usuario y cambio de contraseña">
				<i class="icon-user"> </i>
			</a>
			<a class="btn btn-mini" href="<?php echo site_url("Login/logout") ?>" title="Desconectarse de ManteKA">
				<i class="icon-off"> </i>
			</a>
			<a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#" value="Ayuda">
				<b><i class="icon-question-sign"></i></b>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="<?php echo site_url("Ayuda/preguntasFrecuentes") ?>"> Preguntas Frecuentes</a>
				</li>
				<li>
					<a href="/<?php echo config_item('dir_alias') ?>/index.php/About/acercaNosotros"> Acerca de Nosotros</a>
				</li>
				<li>
					<a href="/<?php echo config_item('dir_alias') ?>/manual_usuario.pdf" target="blank">Manual de Usuario</a>
				</li>
			</ul>
		</div>
