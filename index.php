<?php include('login_register_option.php'); ?>
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
  <form class="form-inline my-2 my-lg-0">
      <input class="form-control ml-sm-2" type="buscar" placeholder="Buscar" aria-label="Buscar">
      <button class="btn btn-outline-success my-2 my-sm-0 btnsearch" type="submit">Buscar cursos</button>
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
        <a class="nav-link disabled" href="#">¿Quiénes Somos?</a>
      </li>
    </ul>
  </div>
</nav>
    <!-- FIN NAVBAR -->

    <!-- CARRUSEL -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="imgcarrousel" src="img/lobos.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="imgcarrousel" src="img/pelao.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="imgcarrousel" src="img/01.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <!-- FIN CARRUSEL -->


    <!-- LISTA DE CURSOS -->
    <div class="heightcard card text-center">
  	<div class="card-header">
    Curso por Nicolás Lobos
 	 </div>
  	<div class="card-body">
    <h5 class="card-title">Tu cursito</h5>
    <img src="img/lobosthumb.jpg" class="cursitotarjeta" alt="Second slide">
    <p class="card-text">Bueno aquí Nicolás Lobos les explicará como hacerse un pancito.</p>
    <a href="detallecurso.php" class="btn btn-primary">Ver Detalles</a>
  	</div>
  	<div class="card-footer text-muted">
    Publicado el 19/10/2021
  	</div>
	</div>
	</div>
	&nbsp;&nbsp;&nbsp;&nbsp;	

	<div class="heightcard card text-center">
  	<div class="card-header">
    Curso por el Pelao Open English
 	 </div>
  	<div class="card-body">
    <h5 class="card-title">Open English</h5>
    <img src="img/pelaothumb.jpg" class="cursitotarjeta" alt="Second slide">
    <p class="card-text">Tenemos al mismísimo pelao de open english para explicarte.</p>
    <a href="detallecurso.php" class="btn btn-primary">Ver Detalles</a>
  	</div>
  	<div class="card-footer text-muted">
    Publicado el 19/10/2021
  	</div>
	</div>
	</div>
	&nbsp;&nbsp;&nbsp;&nbsp;

  	<!-- FIN LISTA DE CURSOS -->

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