<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title></title>
    
    <link rel="icon" type="image/x-icon" href="<?php echo base_url()."assets/"; ?>favicon.ico" />
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>slider/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/fuente.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>slider/css/estilos.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>chatbox/style.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>simple-sidebar.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>select2/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/slider/css/slider.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<body>
  <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>bootstrap/js/jquery.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>slider/js/main.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>chatbox/chatbox.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>select2/select2.full.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>bower_components/slider/js/bootstrap-slider.js"></script>


    
<header class="main-header">
  <nav class="navbar navbar-expand-lg navbar-inverse ">
    <a class="navbar-brand" href="<?php echo site_url(); ?>/welcome"><img width="50%" src="<?php echo base_url()."assets/"; ?>slider/img/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="<?php echo site_url(); ?>/welcome">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url(); ?>/empresa">Empresa</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Maquinas
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <h6 class="dropdown-header">Plataformas</h6>
            <a class="dropdown-item" href="#">Elevadores personales</a>
            <a class="dropdown-item" href="#">Elevadores Tijeras</a>
            <a class="dropdown-item" href="#">Brazos articulados</a>
            <a class="dropdown-item" href="#">Brazos telescopicos</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Manipuladores</h6>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Torres</h6>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url(); ?>/contacto">Contacto</a>
        </li>
        
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
  
</header>
    <!--<div class="container-fluid">
        <nav class="navbar navbar-inverse fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url(); ?>/welcome"><img width="50%" src="<?php echo base_url()."assets/"; ?>slider/img/logo.png"></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav mr-auto">
                    <li><a id="inicio" href="<?php echo site_url(); ?>/welcome">Inicio <span class="sr-only">(current)</span></a></li>
                    <li><a id="empresa" href="<?php echo site_url(); ?>/empresa">Empresa</a></li>
                    <li><a id="maquinaria" href="<?php echo site_url(); ?>/maquinaria">Maquinaria</a></li>
                    <li><a id="contacto" href="<?php echo site_url(); ?>/contacto">Contacto</a></li>
                </ul>
            </div>
        </div>
        </nav>-->
    
