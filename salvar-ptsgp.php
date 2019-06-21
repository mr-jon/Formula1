<?php
  session_start();
  if (! isset($_SESSION['email'])) {
    $erro = "Usuário não logado";
    include_once "login.php";
    exit(0);
  }
  include_once "funcao.php";
  $usuario = obterUsuarioByEmail($_SESSION['email']);

  $piloto = obterPilotoById($_POST['codPiloto']);
  
  $ptsGp = array();
  $ptsGp["codGp"] = $_POST["codGp"];
  $ptsGp["codPiloto"] = $_POST["codPiloto"];
  $ptsGp["codEquip"] = $piloto["codEquip"];
  $ptsGp["pts"] = $_POST["pts"];
  $hasGp = obterPtsPilotoGp($ptsGp['codPiloto']);
    // var_dump($ptsGp);
  // exit(0);

  if ($ptsGp['codGp'] == $hasGp['codGp']) :
    include 'header.php';
    ?>
    <div class="text-center mt-5">
      <h1>Piloto já tem pontuação nesse GP!</h1>
      <a href='cadastrar-ptsgp.php'><< voltar</a>
    </div>
    <?php
    include 'footer.php';
    // alterarPtsGp($ptsGp);
  else: 
    salvarPtsGp($ptsGp);
    header("location: listar-ranking.php");
  endif;
  exit();

 ?>
