<?php
/**
* Este Archivo corresponde al cuerpo central de la vista eliminar grupos de contacto en el proyecto Manteka.
*
* @package    Manteka
* @subpackage Views
* @author     Grupo 2 IHC 1-2013 Usach
*/
?>
<script type="text/javascript">
	var grupoEliminar = "";
	function DetalleGrupo(id_grupo, cliqueado){
		//function DetalleSeccion(cod_seccion){
			/* se marca el objeto cliqueado */
			$('tr.highlight').removeClass("highlight");
			$("#"+cliqueado).addClass("highlight");
			grupoEliminar = id_grupo;

			/* Defino el ajax que hará la petición al servidor */
			$.ajax({
				type: "POST", /* Indico que es una petición POST al servidor */
				url: "<?php echo site_url("GruposContactos/getDatosGrupo") ?>", /* Se setea la url del controlador que responderá */
				data: { id: id_grupo }, /* Se codifican los datos que se enviarán al servidor usando el formato JSON */


				success: function(respuesta) { /* Esta es la función que se ejecuta cuando el resultado de la respuesta del servidor es satisfactorio */
					console.log (respuesta);
					/* Obtengo los objetos HTML donde serán escritos los resultados */
					var tbody = document.getElementById("tbody2");
					$('#tbody2').empty();

					/* Decodifico los datos provenientes del servidor en formato JSON para construir un objeto */
					var datos = jQuery.parseJSON(respuesta);

					/* Seteo los valores desde el objeto proveniente del servidor en los objetos HTML */
					for (var i = 0; i < datos.length; i++) {
						$("#tbody2").append("<tr><td>"+datos[i][0]+"</td><td>"+datos[i][1]+"</td><td>"+datos[i][2]+"</td><td>"+datos[i][3]+"</td></tr>");
					};
					

					/* Quito el div que indica que se está cargando */
					var iconoCargado = document.getElementById("icono_cargando");
					$(icono_cargando).hide();
				}
			}
		);
		
		/* Muestro el div que indica que se está cargando... */
		var iconoCargado = document.getElementById("icono_cargando");
		$(icono_cargando).show();

	//}
		
			
	}
</script>

						
<script type="text/javascript">
function ordenarFiltro(){
	var filtroLista = document.getElementById("filtroLista").value;

	
	var arreglo = new Array();
	var sala;
	var ocultar;
	var cont;
	
	<?php
	$contadorE = 0;
	while($contadorE<count($rs_nombres_contacto)){
		echo 'arreglo['.$contadorE.']=new Array();';
		echo 'arreglo['.$contadorE.']["NOMBRE_FILTRO_CONTACTO"] = "'.$rs_nombres_contacto[$contadorE]['NOMBRE_FILTRO_CONTACTO'].'";';
		$contadorE = $contadorE + 1;
	}
	?>
	
	
	for(cont=0;cont < arreglo.length;cont++){
		ocultar=document.getElementById(cont);
		if(0 > arreglo[cont]['NOMBRE_FILTRO_CONTACTO'].toLowerCase ().indexOf(filtroLista.toLowerCase ())){
			ocultar.style.display='none';
		}
		else{
			ocultar.style.display='';
		}
    }
}
</script>

<div class="row-fluid">
<div class="span10">
<fieldset>
	<legend>Borrar grupo</legend>
	<div class="row-fluid">
		<div class="span4">
			<div class="row-fluid">
				<div class="span6">
					1.-Listado sala
				</div>
			</div>
			<div class="row-fluid">
				<div>
					<div class="row-fluid">	
						<input id="filtroLista"  onkeyup="ordenarFiltro()" type="text" placeholder="Filtrar por nombre" style="width:90%">
					</div>	
				</div>
			</div>
			<div class="row-fluid" style="margin-left: 0%;">
					<div style="border:#cccccc  1px solid;overflow-y:scroll;height:330px; -webkit-border-radius: 4px" ><!--  para el scroll-->
						<table class="table table-hover">
							<thead>
								<tr>
									<th >
										Nombre de Grupo
									</th>
								</tr>
							</thead>
							<tbody>
							
								<?php
								$contador=0;
								$comilla= "'";
								echo '<form id="formDetalle" type="post">';
								while ($contador<count($rs_nombres_contacto)){
									echo '<tr id="tr'.$contador.'">';
									echo	'<td  id="'.$contador.'" onclick="DetalleGrupo('.$comilla.$rs_nombres_contacto[$contador]['ID_FILTRO_CONTACTO'].$comilla.', '.$comilla.'tr'.$contador.$comilla.')" style="text-align:left;">'. $rs_nombres_contacto[$contador]['NOMBRE_FILTRO_CONTACTO'].'</td>';
									echo '</tr>';
																
									$contador = $contador + 1;
								}
								echo '</form>';
								?>
														
							</tbody>
						</table>
					</div>
				
			
				<!--</div>-->
			</div>
		</div>
		<div class="span8" style="margin-left: 2%; padding: 0%; ">
		2.-Detalle del Grupo:
		  	<div id="listaDestinatarios" style="margin-top:50px;">
				<table id="tabla2" class="table table-hover table-bordered" style=" width:100%; display:block; height:331px; cursor:pointer;overflow-y:scroll;margin-bottom:0px">
					<thead>
						<tr>
							<th>Rut</th>
							<th>Nombre </th>
							<th>Tipo</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody id="tbody2">
						
					</tbody>
				</table>
			</div>
			<div class="row-fluid text-right" style="margin-top: 4%;">
			
				<button class ="btn" type="button" onclick="verificarGrupo()" >
					<div class="btn_with_icon_solo">Ë</div>
					&nbsp Eliminar
				</button>
				<button class ="btn" type="reset" onclick="CancelarSeleccion()"  >
					<div class="btn_with_icon_solo">Â</div>
					&nbsp Cancelar
				</button>
			</div>
			<br />
			<!-- Modal de confirmacion -->
			<div id="modalConfirmacion" class="modal hide fade">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Confirmación</h3>
				</div>
				<div class="modal-body">
					<p>Se va a eliminar el grupo seleccionado ¿Está seguro?</p>
				</div>
				<div class="modal-footer">
					<button class="btn" type="button" data-dismiss="modal" onclick="eliminarGrupo()" ><div class="btn_with_icon_solo">Ã</div>&nbsp; Aceptar</button>
					<button class="btn" type="button" data-dismiss="modal"><div class="btn_with_icon_solo">Â</div>&nbsp; Cancelar</button>
					
				</div>
			</div>

			<!-- Modal de seleccionaAlgo -->
			<div id="modalSeleccioneAlgo" class="modal hide fade">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>No ha seleccionado ningún grupo</h3>
				</div>
				<div class="modal-body">
					<p>Por favor seleccione un grupo y vuelva a intentarlo</p>
				</div>
				<div class="modal-footer">
					<button class="btn" type="button" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
			<!-- Modal de eliminado Correctamente -->
			<div id="modalListo" class="modal hide fade">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Eliminado</h3>
				</div>
				<div class="modal-body">
					<p>Se ha eliminado correctamente el grupo seleccionado.</p>
				</div>
				<div class="modal-footer">
					<button class="btn" type="button" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
</fieldset>
</div>
</div>

<script type="text/javascript">
	function CancelarSeleccion(){
		$('#tbody2').empty();
		$('tr.highlight').removeClass("highlight");
		grupoEliminar = "";
	}
	function verificarGrupo(){
		if(grupoEliminar !=""){
			$('#modalConfirmacion').modal();
			return false;
		}
		else{
			$('#modalSeleccioneAlgo').modal();
		}
	}
	function eliminarGrupo(){
		/* Defino el ajax que hará la petición al servidor */
		var iconoCargado = document.getElementById("icono_cargando");
		$(icono_cargando).show();
		$('#modalConfirmacion').hide();
		$.ajax({
			type: "POST", /* Indico que es una petición POST al servidor */
			url: "<?php echo site_url("GruposContactos/eliminarGrupo") ?>", /* Se setea la url del controlador que responderá */
			data: { id: grupoEliminar }, /* Se codifican los datos que se enviarán al servidor usando el formato JSON */
			success: function(respuesta) { /* Esta es la función que se ejecuta cuando el resultado de la respuesta del servidor es satisfactorio */
				console.log (respuesta);
				/* Obtengo los objetos HTML donde serán escritos los resultados */
				var tbody = document.getElementById("tbody2");
				$('#tbody2').empty();
				$('tr.highlight').remove();
			}
		});
		/* Quito el div que indica que se está cargando */
		var iconoCargado = document.getElementById("icono_cargando");
		$(icono_cargando).hide();
		$('#modalListo').modal();
	}
</script>