<!-- Esta es la barra lateral con las operaciones que puede realizar el usuario seg�n el bot�n de la barra superior en que se encuentre -->
	<div class="accordion" id="accordion2">
		<div class="accordion-group">
		    <div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
				Planificaci�n
		    </div>
		    <div id="collapseTwo" class="accordion-body collapse in">
		    	<div class="accordion-inner">
		        	<li class="active"><a href="<?php site_url("Planificacion/verPlanificacion")?>">Ver planificaci�n</a></li>
					<li><a href="<?php echo site_url("Planificacion/editarPlanificacion")?>">Editar planificaci�n</a></li>
		     	</div>
		    </div>
	  </div>
	  <div class="accordion-group">
		    <div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
				M�dulos 
		    </div>
		    <div id="collapseThree" class="accordion-body collapse">
		    	<div class="accordion-inner">
					<li><a href="<?php echo site_url("Modulos/verModulos")?>">Ver m�dulos</a></li>
		        	<li><a href="<?php echo site_url("Modulos/agregarModulos")?>">Agregar m�dulos</a></li>
					<li><a href="<?php echo site_url("Modulos/editarModulos")?>">Editar m�dulos</a></li>
					<li><a href="<?php echo site_url("Modulos/borrarModulos")?>">Borrar m�dulos</a></li>
		     	</div>
		    </div>
	  </div>
	</div>

