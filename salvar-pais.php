<?php
  session_start();
  if (! isset($_SESSION['email'])) {
    $erro = "Usuário não logado";
    include_once "login.php";
    exit(0);
  }
  include_once "funcao.php";
  $usuario = obterUsuarioByEmail($_SESSION['email']);


  $pais = array();
  $pais["codPais"] = $_POST["id"];
  $pais["nome"] = $_POST["nome"];
  // var_dump($pais);
  // exit(0);

  if ($pais['codPais'] == 0) {
    salvarPais($pais);
  } else {
    alterarPais($pais);
  }
  header("location: listar-paises.php");
  exit();

 ?>
