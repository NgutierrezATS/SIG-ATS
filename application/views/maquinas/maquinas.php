		
        <!-- /#sidebar-wrapper -->
        
		<div id="wrapper" >
        <!-- Sidebar -->
	        <div id="sidebar-wrapper">
	            <ul class="sidebar-nav">
	            	<form method="POST" id="filtroform" name="filtroform" accept-charset="utf-8">
		                <li class="sidebar-brand">
		                	<h3>
		                		
		                        Filtro de Máquinas
		                	</h3>
		                </li>
		                <li>
		                    <label>Altura (Metros)</label>
							<div class="form-group">
								
							   	 <input class="form-control" id="ex12c" type="text" data-slider-step="1"/>
							   	 <div class="row">
							   	 	<div class="col-sm-3">
							   	 		<span id="smin">0 Metros</span>
							   	 	</div>
							   	 	<div class="col-sm-4">
							   	 		<span id="smax">20 Metros</span>
							   	 	</div>
							   	 </div>
								<input type="hidden" id="hiddenR">
							</div>
		                </li>
		                <li>
		                    <div class="form-group col-sm-6">
								<label for="tipo">Marca</label>
		                        <select class="form-control" id="marca" name="marca">
		                        	<option selected disabled>Filtrar por Marca</option>
		                            <option value="Genie">Genie</option>
		                            <option value="JLG">JLG</option>
		                        </select>
							</div>
		                </li>
		                <li>
		                    <div class="form-group col-sm-6">
								<label for="tipo">Tipo de Energía</label>
		                        <select class="form-control" id="energia" name="energia">
		                        	<option selected disabled>Filtrar por tipo de energía</option>
		                            <option value="electrico">Eléctricos</option>
		                            <option value="diesel">A Combustión</option>
		                        </select>
							</div>
		                </li>
	            	</form>
	            </ul>
	        </div>
        <!-- Page Content -->
        <div id="page-content-wrapper" class="filtrado">
            <!-- <div class="container-fluid"> -->
            	
                 <?php foreach ($this->session->userdata('maquinas') as $key): ?> 
					<?php if ($key->ID_TIPO == 1 || $key->ID_TIPO == 2 || $key->ID_TIPO == 3 ){ ?>
						<form method="POST" accept-charset="utf-8" action="<?php echo site_url(); ?>/maquinas/modelo">
							<input id="form" type="hidden" name="modelo" id="modelo" value="<?php echo $key->MODELO ?>|<?php echo $key->ID_TIPO ?>"/>
							<div class="col-md-4">
								<button type="submit" class="btn" style="background-color: transparent;">
									<div class="thumbnail text-center">
										<img height="25%" width="25%" src="<?php echo base_url()."imagenes/min/$key->FOTOMIN"; ?>" alt="">
										<div class="caption">
											<h2><?php echo $key->MARCA; ?> - <?php echo $key->MODELO; ?></h2>
											<table class="table table-striped">
												<tr>
													<th class="text-center">Energía</th>
													<th class="text-center">Altura de trabajo</th>
												</tr>
												<tr>
													<td><?php echo $key->ENERGIA; ?></td>
													<td><?php echo $key->ALTURA_TRABAJO; ?> Metros</td>
												</tr>
											</table>
										</div>
									</div>
								</button>
							</div>
						</form>
					<?php } elseif ($key->ID_TIPO == 4) { ?>
						<form method="POST" accept-charset="utf-8" action="<?php echo site_url(); ?>/maquinas/modelo">
							<input id="form" type="hidden" name="modelo" id="modelo" value="<?php echo $key->MODELO ?>|<?php echo $key->ID_TIPO ?>">
							<div class="col-md-4">
								<button type="submit" class="btn" style="background-color: transparent;">
									<div class="thumbnail text-center">
										<img height="25%" width="25%" src="<?php echo base_url()."imagenes/min/$key->FOTOMIN"; ?>" alt="">
										<div class="caption">
											<h2><?php echo $key->MARCA; ?> - <?php echo $key->MODELO; ?></h2>
											<table class="table table-striped table-bordered table-hover">
												<tr>
													<th class="text-center">Altura de levantamiento</th>
													<th class="text-center">Capacidad Máxima</th>
												</tr>
												<tr>
													<td><?php echo $key->ALTURA_LEVANTAMIENTO; ?> Metros</td>
													<td><?php echo $key->CARGA_MAXIMA; ?> Kilógramos</td>
												</tr>
											</table>
										</div>
									</div>
								</button>
							</div>
						</form>
					<?php } else { ?>
						<form method="POST" accept-charset="utf-8" action="<?php echo site_url(); ?>/maquinas/modelo">
							<input id="form" type="hidden" name="modelo" id="modelo" value="<?php echo $key->MODELO ?>|<?php echo $key->ID_TIPO ?>">
							<div class="col-md-4">
								<button type="submit" class="btn" style="background-color: transparent;">
									<div class="thumbnail text-center">
										<img height="25%" width="25%" src="<?php echo base_url()."imagenes/min/$key->FOTOMIN"; ?>" alt="">
										<div class="caption">
											<h2><?php echo $key->MARCA; ?> - <?php echo $key->MODELO; ?></h2>
											<table class="table table-striped table-bordered table-hover bg-success">
												<tr>
													<th class="text-center">Altura</th>
													<th class="text-center">Generador</th>
												</tr>
												<tr>
													<td><?php echo $key->ALTURA; ?> Metros</td>
													<td><?php echo $key->GENERADOR; ?> Hz</td>
												</tr>
											</table>
										</div>
									</div>
								</button>
							</div>
						</form>
					<?php } ?>
				<?php endforeach ?>
                  
            <!-- </div> -->
        </div>
        <!-- /#page-content-wrapper -->

    
<!-- <div class="container" data-spy="scroll" data-target="#myScrollspy" data-offset="15">
	<div class="row">
		<div class="col-sm-4">
			<div class="jumbotron bd-sidebar" data-spy="affix" data-offset-top="100">
				<h3>Filtro de máquinas</h3>
				<hr>
				<form method="POST" id="filtroform" name="filtroform" accept-charset="utf-8" action="<?php echo site_url(); ?>/maquinas/tipo">
					<div class="row">
						<label>Altura (Metros)</label>
						<div class="form-group">
							<span>0</span>
						   	 <input class="form-control" id="ex12c" type="text" data-slider-step="0.5"/>
							<span>20</span>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="tipo">Marca</label>
	                        <select class="form-control" id="id_tipo" name="id_tipo">
	                        	<option selected disabled>Filtrar por Marca</option>
	                            <option>Genie</option>
	                            <option value="">JLG</option>
	                        </select>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="tipo">Tipo de Energía</label>
	                        <select class="form-control" id="id_tipo" name="id_tipo">
	                        	<option selected disabled>Filtrar por tipo de energía</option>
	                            <option>Eléctricos</option>
	                            <option value="">A Combustión</option>
	                        </select>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		
	</div>
</div> -->

<script>
	$("#ex12c").slider({ id: "slider12c", min: 0, max: 20, range: true, value: [0, 20] });
jQuery(document).ready(function($) {
	$('.slider-handle').on('mousemove', function () {
		// e.preventDefault();
		// body...
		var a = $('.tooltip-inner').text();
		var result = a.split(' : ');
		$('#smin').text(result[0] + ' Metros');
		$('#smax').text(result[1] + ' Metros');
		
		$('#filtroform').change();
	})


	$('#filtroform').on('change', function (argument) {
		$.ajax({
			url: '<?php echo site_url('filtrar') ?>',
			type: 'POST',
			dataType: 'JSON',
			data: {alturamin  : $('#smin').text(),
				   alturamax  : $('#smax').text(),
				   marca   	  : $('#marca').val(),
			       energia 	  : $('#energia').val()},
		})
		.done(function(d) {
			$('.filtrado').html(d);
		})
		.fail(function() {
		})
		.always(function() {
		});
		
		console.log('a');
	})
	
});
</script>
<script>
    	$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
        $("#wrapper").toggleClass("toggled");
   
</script>
