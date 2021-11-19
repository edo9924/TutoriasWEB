<?php include('subircursotutorretorno.php'); ?>
<?php include('login_register_option.php'); ?>
<?php global $cantidadClases; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title>Maqueta Tutorías</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		.carousel-item {
 	 	height: 500px;
		}

		.imgcarrousel {
			height: 450px;
			width: 100%;
		}

		.heightcard {
			width: 50%;
			margin-left: 27%;
		}

		.btnsearch {
    	background-color: #FFFFFF;
		}

    .cursitotarjeta {
      width: 50%;
      height: 50%;
    }

    .centered {
      text-align: center;
    }

</style>
</head>
<body>
	<!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- NAVBBAR -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">LosK-Tutos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form action="buscar_curso.php" class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control ml-sm-2" type="text" name="busqueda" placeholder="Buscar">
      <input class="btn btn-outline-success my-2 my-sm-0 btnsearch" name="buscar" value="Buscar cursos" type="submit">
    </form>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tu Cuenta
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php echo $login_register_option; ?>
      </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="formulariocontacto.php">Contacto</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="quienessomos.php">¿Quiénes Somos?</a>
      </li>
    </ul>
  </div>
</nav>
    <!-- FIN NAVBAR -->

    <!-- INICIO PANEL -->
<br>
    <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="paneltutor.php">Perfil</a>
    <br>
    <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="subircursotutor.php">Subir Curso</a>
  </li>
  </ul>
    <div class="centered">
    <!-- FIN PANEL -->
<?php echo $success_msg; ?>
    <h1>Llena los datos del curso.</h1>
    <!-- Formulario-->
<div class="d-flex justify-content-center">
<form action="" method="post" enctype="multipart/form-data">  
    <div class="form-group">
    <label for="InputName">Nombre del curso</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Ingresa un nombre para el curso">
    <?php echo $emptyError1; ?>
    <?php echo $_NameErr; ?>
    <?php echo $name_exist; ?>
  </div>
  <div class="form-group">
    <label for="InputName">¿De qué trata su curso?</label>
    <input type="text" class="form-control" id="desripcion" name="descripcion" aria-describedby="descHelp" placeholder="Ingresa una descripción">
    <?php echo $emptyError2; ?>
    <?php echo $_DescriptionErr; ?>
  </div>
  
  <h4>Ingresa una imágen para describir tu curso.</h4>
  <div class="custom-file form-group">
    <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
    <label class="custom-file-label" for="customFile">Elige una portada</label>
    <?php echo $emptyError3; ?>
  </div>
  &nbsp;
  
<p>Selecciona el valor de tu curso:</p>

<div class = "form-group">
  <input type="radio" id="bajo" name="seleccionPrecio" value="bajo"
         checked>
  <label for="huey">$2.500 CLP</label>
</div>

<div class = "form-group">
  <input type="radio" id="medio" name="seleccionPrecio" value="medio">
  <label for="dewey">$5.000 CLP</label>
</div>

<div class = "form-group">
  <input type="radio" id="alto" name="seleccionPrecio" value="alto" onclick="alertarAvanzado()">
  <label for="louie">$7.500 CLP</label>
</div>

<div class = "form-group">
  <input type="radio" id="muy alto" name="seleccionPrecio" value="muyalto" onclick="alertarAvanzado()">
  <label for="penie">$10.000 CLP</label>
</div>
<?php echo $emptyError4; ?>

  <button type="submit" id="submit" name="submit" class="btn btn-primary">Subir Curso</button>
  <br>
<input type="hidden" name="clasesporcurso" value="contador" id="clasesporcurso">
</form>
    </div>
  </li>
    <br>

  <!-- Footer -->
  <section class="">
  <footer class="text-center text-white" style="background-color: #0275d8;">
    <div class="container p-4 pb-0">
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3">¿Quieres hacer clases? ¡Regístrate como tutor! &nbsp;</span>
          <button type="button" class="btn btn-outline-success my-2 my-sm-0 btnsearch">
            <a href="registrotutor.php">
            Registrarse
            </a>
          </button>
        </p>
      </section>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2021 Copyright:
      <a class="text-white">LosKTutos.com</a>
    </div>
  </footer>
</section>
  <!-- Fin Footer -->
</body>
</html>