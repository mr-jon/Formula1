<?php
  session_start();
  if (! isset($_SESSION['email'])) {
    $erro = "Usuário não logado";
    include_once "login.php";
    exit(0);
  }
  include_once "funcao.php";
  $usuario = obterUsuarioByEmail($_SESSION['email']);


  $usuario = array();
  $usuario["id"] = $_POST["id"];
  $usuario["nome"] = $_POST["nome"];
  $usuario["email"] = $_POST["email"];
  $usuario["senha"] = $_POST["senha"];
  // var_dump($pais);
  // exit(0);

  if ($usuario['id'] == 0) {
    salvarUsuario($usuario);
  } else {
    alterarUsuario($usuario);
  }
  header("location: listar-usuario.php");
  exit();

 ?>
