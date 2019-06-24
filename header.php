<?php
  $logado = (isset($_SESSION['email'])) ? true : false;

  switch ($_SERVER['REQUEST_URI']) {
    case '/formula1/dashboard.php':
      $activeDashboard = "active";
      break;
    case '/formula1/listar-ranking.php':
      $activeRanking = "active";
      break;
    case '/formula1/listar-campeaoporgp.php':
      $activeCampeaoPorGp = "active";
      break;
    case '/formula1/listar-pilotos.php':
      $activePilotos = "active";
      break;
    case '/formula1/listar-equipes.php':
      $activeEquipes = "active";
      break;
    case '/formula1/listar-paises.php':
      $activePaises = "active";
      break;
    case '/formula1/listar-gp.php':
      $activeGps = "active";
      break;
    default:
      break;
  }
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

    <style type="text/css">
        img{
            height: calc(100vh - 463px);
            object-fit: cover;
        }
    </style>

</head>
<body class="position-relative">
  <div class="jumbotron jumbotron-fluid mb-0 bg-danger text-white">
    <div class="container text-center">
      <h1 class="display-2 font-italic font-weight-bold"><strong> Fómula 1 </strong><i class="fas fa-tire fa-spin"></i></h1>
      <p class="lead">Sistema de Gerenciamento de Grandes Prêmios de Fórmula 1</p>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
          <?php if ($logado): ?>
            <li class="nav-item  <?= $activeDashboard ?>">
              <a class="nav-link" href="dashboard.php">Painel<span class="sr-only">(Página atual)</span></a>
            </li>
          <?php endif ?>
          <li class="nav-item <?= $activeRanking ?>">
            <a class="nav-link" href="listar-ranking.php">Ranking Geral</a>
          </li>
          <?php if ($logado): ?>
          <li class="nav-item <?= $activeCampeaoPorGp ?>">
            <a class="nav-link" href="listar-campeaoporgp.php">Ranking por GP's</a>
          </li>
          <?php endif ?>
          <li class="nav-item <?= $activePiloto ?>">
            <a class="nav-link" href="listar-pilotos.php">Pilotos</a>
          </li>
          <li class="nav-item <?= $activeEquipes ?>">
            <a class="nav-link" href="listar-equipes.php">Equipes</a>
          </li>
          <li class="nav-item <?= $activePaises ?>">
            <a class="nav-link" href="listar-paises.php">Países</a>
          </li>
          <li class="nav-item <?= $activeGps ?>">
            <a class="nav-link" href="listar-gp.php">GP's</a>
          </li>
        </ul>
				<?php if ($logado): ?>
						<a class="nav-link text-light" href="logout.php">Logout <i class="fas fa-sign-in-alt"></i></a>
				<?php else: ?>
        		<a class="nav-link text-light" href="login.php">Login</a>
				<?php endif; ?>
      </div>
    </div>
  </nav>
