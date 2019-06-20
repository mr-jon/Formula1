<?php
  session_start();
  if (! isset($_SESSION['email'])) {
    $erro = "Usuário não logado";
    include_once "login.php";
    exit(0);
  }
  include_once "funcao.php";
  $usuario = obterUsuarioByEmail($_SESSION['email']);


  $gp = array();
  $gp["codGp"] = $_POST["id"];
  $gp["codPais"] = $_POST["codPais"];
  $gp["nome"] = $_POST["nome"];
   var_dump($gp);
  // exit(0);

  if ($gp['codGp'] == 0) {
    salvarGp($gp);
  } else {
    alterarGp($gp);
  }
  header("location: listar-gp.php");
  exit();

 ?>
