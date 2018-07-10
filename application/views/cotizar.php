<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Cotizacion ATS</title>
    
    <link rel="icon" type="image/x-icon" href="<?php echo base_url()."assets/"; ?>favicon.ico" />
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>slider/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/fuente.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>slider/css/estilos.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>chatbox/style.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>select2/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/slider/css/slider.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<body>
    <script src="<?php echo base_url()."assets/"; ?>bootstrap/js/jquery.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>slider/js/main.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>chatbox/chatbox.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>select2/select2.full.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>bower_components/slider/js/bootstrap-slider.js"></script>


<nav class="navbar navbar-expand-lg navbar-inverse ">
  <a class="navbar-brand" href="#"><img width="50%" src="<?php echo base_url()."assets/"; ?>slider/img/logo.png"></a>
</nav>
	<br>
	<center><h3>Realiza tu cotización con ATS</h3></center>
	<br>
	<div class="mx-3">
		<form action="<?php echo site_url(); ?>/cotizar/send" method="post">
			<div class="row col-sm-12">
				<div class="form-group  col-sm-6">
					<label for="nombre" >Nombre:</label>
					<input type="text" class="form-control" id="nombre"  placeholder="Ejemplo: Alberto" maxlength="15" required>
				</div>
				<div class="form-group  col-sm-6" >
					<label for="apellido" >Apellido:</label>
					<input type="text" class="form-control" id="apellido"  placeholder="Ejemplo: Gonzales" maxlength="15" required>
				</div>
			</div>
			<div class="row col-sm-12">
				<div class="form-group col-sm-12">
					<label for="empresa">Empresa:</label>
					<input type="text" class="form-control" id="empresa"  placeholder="Ejemplo: Mi Empresa S.A" maxlength="50" required>
				</div>
			</div>
			<div class="row col-sm-12">
				<div class="form-group  col-sm-6">
					<label for="email" >Correo Electronico:</label>
					<input type="email" class="form-control" id="email"  placeholder="Ejemplo: agonzales@gmail.com" maxlength="30" required>
				</div>
				
				<div class="form-group col-sm-6">
					<label for="rut">Rut Empresa:</label>
					<input type="text" class="form-control" id="rut"  placeholder="Ejemplo: 123456789-k" maxlength="13" required>
				</div>
			</div>
			<div class="row col-sm-12">
				<div class="form-group col-sm-12">
					<label for="direccion">Direccion:</label>
					<input type="text" class="form-control" id="direccion"  placeholder="Ejemplo: Avenida El juncal 350, Quilicura " maxlength="30" required>
				</div>
			</div>
			<div class="row col-sm-12">
				<div class="form-group col-sm-6">
					<label for="ciudad">Ciudad:</label>
					<input type="text" class="form-control" id="ciudad"  placeholder="Ejemplo: Santiago" maxlength="15" required>
				</div>
				<div class="form-group col-sm-6">
					<label for="giro">Giro:</label>
					<input type="text" class="form-control" id="giro"  placeholder="Ejemplo: 452020" maxlength="50" required>
				</div>
				
			
			
			</div>
			<div class="row col-sm-12">
				<div class="form-group col-sm-6">
					
					<label for="numero">Numero de contacto:</label>
					<input type="tel" class="form-control" id="numero"  maxlength="12" placeholder="Ejemplo +56987654321" required/></span>
					
				</div>
				<div class="form-group col-sm-6">
						<label for="altura">Altura de trabajo requerida:</label><br>
						<select class="form-control  select2 select2-hidden" id="altura" required>
							<option selected="selected" disabled>Seleccione una altura</option>
							<?php foreach ($modelos as $key): ?>
	                                <option value="<?php echo $key->ALTURA_TRABAJO ?>"><?php echo $key->ALTURA_TRABAJO; ?></option>       
	                            <?php endforeach ?>
						</select>
				</div>
			</div>
			<div class="row col-sm-12">
				<div class="form-group col-sm-12">
				    <label for="mensaje">Mensaje:</label>
				    <textarea class="form-control" id="mensaje" rows="3" placeholder="" maxlength="250"></textarea>
				</div>

			</div>
			
				<center><button id="boton" type="submit" class="btn btn-ats disabled">Enviar Cotización</button></center>
			
		</form>
	</div>
</body>
<div class="clearfix"></div>
<footer>
	<div class="footer">
		<div class="container-fluid">
			<center><p><strong>“El Juncal 350 – Quilicura (56-2) 2446 4612 – (56-9) 9222 9157”</strong></p></center>
		</div>
	</div>
</footer>
</html>

<script>
    $(function(){
        $('.select2').select2();
        $('.select2').on("select2:select",function(){
        	$('#boton').removeClass('disabled');
        })

    });
</script>