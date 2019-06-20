<?php
  session_start();
  if (! isset($_SESSION['email'])) {
    $erro = "Usuário não logado";
    include_once "login.php";
    exit(0);
  }
  include_once "funcao.php";
  $usuario = obterUsuarioByEmail($_SESSION['email']);


  $equipe = array();
  $equipe["codEquip"] = $_POST["id"];
  $equipe["codPais"] = $_POST["codPais"];
  $equipe["nome"] = $_POST["nome"];
   // var_dump($equipe);
  // exit(0);

  if ($equipe['codEquip'] == 0) {
    salvarEquipe($equipe);
  } else {
    alterarEquipe($equipe);
  }
  header("location: listar-equipes.php");
  exit();

 ?>
