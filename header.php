<?php
 $logado = (isset($_SESSION['email'])) ? true : false;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Fómula 1</title>
	<!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/pro.css">

</head>
<body>
  <div class="jumbotron jumbotron-fluid mb-0 bg-danger text-white">
    <div class="container text-center">
      <h1 class="display-2 font-italic font-weight-bold"><strong> Fómula 1 </strong><i class="fas fa-tire fa-spin"></i></h1>
      <p class="lead">Sistema de Gerenciamento de Grandes Prêmios de Fórmula 1</p>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link text-danger" href="ranking.php">Ranking<span class="sr-only">(Página atual)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link text-danger" href="listar-pilotos.php">Pilotos</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link text-danger" href="listar-equipes.php">Equipes</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link text-danger" href="listar-paises.php">Países</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link text-danger" href="listar-gp.php">GP's</a>
          </li>
        </ul>
				<?php if ($logado): ?>
						<a class="nav-link text-danger" href="logout.php">Logout</a>
				<?php else: ?>
        		<a class="nav-link text-danger" href="login.php">Login</a>
				<?php endif; ?>
      </div>
    </div>
  </nav>
