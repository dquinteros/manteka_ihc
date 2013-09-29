<script type="text/javascript">
	function cambioSeccion(desde){
		var seccion1 = document.getElementsByName("cod_seccion1");
		var seccion2 = document.getElementsByName("cod_seccion2");
		var cont;
		var numS1;
		var numS2;
		for(cont=0;cont < seccion1.length;cont++){
			if(seccion1[cont].checked == true){
				numS1 = cont;
				cont = seccion1.lenght;
			}
		}
		for(cont=0;cont < seccion2.length;cont++){
			if(seccion2[cont].checked == true){
				numS2 = cont;
				cont = seccion2.lenght;
			}
		}
	
		if(seccion1[numS1].value == seccion2[numS2].value){		
			$('#modalSeccionIgual').modal();
			return false;
		}
		
		if(desde == 1){
			document.getElementById("boton_desde").value = "1";
		}
		else{
			document.getElementById("boton_desde").value = "2";
		}
		$('#modalConfirmacion').modal();
	
	}
</script>

<script type="text/javascript">
	function mostrarS(cod_seccion,tipo_lista){
	//
	$.ajax({//
			type: "POST", /* Indico que es una petición POST al servidor */
			url: "<?php echo site_url("Alumnos/obtenerAlumnosSeccion") ?>", /* Se setea la url del controlador que responderá */
			data: { cod_seccion_post: cod_seccion},
			success: function(respuesta) { /* Esta es la función que se ejecuta cuando el resultado de la respuesta del servidor es satisfactorio */

				var tablaResultados = document.getElementById(tipo_lista+"tabla");
				$(tablaResultados).empty();
				var arrayRespuesta = jQuery.parseJSON(respuesta);
				var tr, td, th, thead, input,nodoTexto;
				thead = document.createElement('thead');
				tr = document.createElement('tr');
				th = document.createElement('th');
				nodoTexto = document.createTextNode("Nombre alumnos de sección");
				th.appendChild(nodoTexto);
				tr.appendChild(th);
				thead.appendChild(tr);
				tablaResultados.appendChild(thead);
				for (var i = 0; i < arrayRespuesta.length; i++) {
					tr = document.createElement('tr');
					td = document.createElement('td');
					input = document.createElement('input');
					input.setAttribute('type','checkbox');
					if(tipo_lista == "lista1_"){
						input.setAttribute('name','seleccionadosS1[]');
					}
					else{
						input.setAttribute('name','seleccionadosS2[]');
					}
					input.setAttribute('value', arrayRespuesta[i].rut);
					nodoTexto = document.createTextNode(" "+arrayRespuesta[i].apellido1+" "+arrayRespuesta[i].apellido2+" "+arrayRespuesta[i].nombre1+" "+arrayRespuesta[i].nombre2);
					td.appendChild(input);
					td.appendChild(nodoTexto);
					tr.appendChild(td);
					tablaResultados.appendChild(tr);
					
				}

				/* Quito el div que indica que se está cargando */
				var iconoCargado = document.getElementById("icono_cargando");
				$(icono_cargando).hide();
				}
		});
	//
	}
</script>

<script type="text/javascript">
function ordenarFiltroSeccion(tipo_seccion){
	var filtroLista = document.getElementById(tipo_seccion).value;
	var arreglo = new Array();
	var ocultarInput;
	var ocultarTd;
	var cont;
	
	<?php
	$contadorE = 0;
	while($contadorE<count($secciones)){
		echo 'arreglo['.$contadorE.'] = "'.$secciones[$contadorE].'";';
		$contadorE = $contadorE + 1;
	}
	?>
	
	for(cont=0;cont < arreglo.length;cont++){
		ocultarInput=document.getElementById(tipo_seccion+arreglo[cont]);
		ocultarTd=document.getElementById(tipo_seccion+cont);
		if(0 > arreglo[cont].toLowerCase ().indexOf(filtroLista.toLowerCase ())){
			ocultarTd.style.display='none';
			//ocultarInput.checked = false;
		}
		else
		{
			ocultarTd.style.display='';
		}
    }
}
</script>





<fieldset>
	<legend>Cambio de sección</legend>
	<div class= "row-fluid">
		<form id="FormS1" type="post"   method="post" action="<?php echo site_url("Estudiantes/postCambiarSeccionEstudiantes/")?>"><!--FORM  SECCION-->
		<div class="span6">
		<input id="boton_desde" type="hidden" name="direccion" value="">
			<div class="row-fluid">
				<div class="span6"> 
					1.- Seleccione una sección:
				</div>
				<div class="span6" style="align:right">
					
					<div class="controls">
						<input type="text" onkeyup="ordenarFiltroSeccion('filtro1_')" id="filtro1_" placeholder="Filtro de Sección" style="width: 93%">
					</div>
					<div style="border:#cccccc 1px solid;overflow-y:scroll;height:200px;-webkit-border-radius: 4px" >
						<table class="table table-hover">
							<thead>
							</thead>
								<tbody>									
									
								</tbody>
						</table>		
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<br>
				Estudiantes de la sección:
				 
				<br>
				<br>
				<div class="row-fluid">
				
					<div class="span12">
						<div class="span6">
							<input id="lista1_filtro"  onkeyup="ordenarFiltro('lista1_')" type="text" placeholder="Filtro búsqueda" style="width:90%">
						</div>
					

						<div class="span6" >
								
								
								<select id="lista1_tipoDeFiltro" title="Tipo de filtro" style="width:100%">
								<option value="1">Filtrar por Nombre</option>
								<option value="3">Filtrar por Apellido paterno</option>
								<option value="4">Filtrar por Apellido materno</option>
								<option value="7">Filtrar por Código carrera</option>
								</select>
						</div> 
					</div>
				</div>
			</div>
		
	
			<div class="row-fluid" style="margin-left: 0%;">
				

					<div style="border:#cccccc  1px solid;overflow-y:scroll;height:400px; -webkit-border-radius: 4px">
						<table class="table table-hover" id="lista1_tabla">

						</table>
					</div>

			</div>

			<div class="controls pull-right" style="margin-top: 7px">
				<button class="btn"  type="button" onclick="cambioSeccion(1)">
					<i class="icon-chevron-right"></i>
					Cambiar de sección
				</button>
			</div>
		</div>
		<div class="span6">
			<div class="row-fluid">
				<div class="span6"> 
					2.- Seleccione una sección:
				</div>
				<div class="span6">
					
					<div class="controls">
						<input type="text" onkeyup="ordenarFiltroSeccion('filtro2_')" id="filtro2_" placeholder="Filtro de Sección" style="width:93%">
					</div>
					<div style="border:#cccccc 1px solid;overflow-y:scroll;height:200px;-webkit-border-radius: 4px" >
						<table class="table table-hover">
							<thead>
							</thead>
								<tbody>									
									
								</tbody>
						</table>
					</div>
				</div>
			</div>
		<div class="row-fluid">
			<br>
			Estudiantes de la sección:
			<br>
			<br>
			<div class="row-fluid">
			
				<div class="span12">
					<div class="span6">
						<input id="lista2_filtro"  onkeyup="ordenarFiltro('lista2_')" type="text" placeholder="Filtro búsqueda" style="width:90%">
					</div>
					<div class="span6">
							<select id="lista2_tipoDeFiltro" title="Tipo de filtro" style="width:100%">
							<option value="1">Filtrar por Nombre</option>
							<option value="3">Filtrar por Apellido paterno</option>
							<option value="4">Filtrar por Apellido materno</option>
							<option value="7">Filtrar por Código carrera</option>
							</select>
					</div> 
				</div>
			</div>
		</div>
			<div class="row-fluid" style="margin-left: 0%;">

					<div style="border:#cccccc  1px solid;overflow-y:scroll;height:400px; -webkit-border-radius: 4px">
						<table class="table table-hover" id="lista2_tabla">

						</table>
					</div>

			</div>
			<div class="controls pull-right" style="margin-top:7px">
				<button class="btn" type="button" onclick="cambioSeccion(2)">
					<i class="icon-chevron-left"></i>
					Cambiar de sección
				</button>
			</div>
		</div>
		<?php echo form_close(""); ?>
	</div>
</fieldset>
