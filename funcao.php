<?php
  function obterConexao() {
    $conexao = mysqli_connect("localhost", "root", "", "minha_loja");
    mysqli_set_charset($conexao, 'utf8');
    return $conexao;
  }

  function obterUsuarioByEmail($email) {
    $conexao = obterConexao();
    $sql = "select * from usuario where email = ?";
    $sentenca = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($sentenca, "s", $email);
    mysqli_stmt_execute($sentenca);
    $resultado = mysqli_stmt_get_result($sentenca);
    $usuario = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $usuario;
  }

   function checkAdmin() {
     if ( session_status() !== PHP_SESSION_ACTIVE ) {
         session_start();
     }
     if (!isset($_SESSION['email'])) {
       return false;
     }
     $email = $_SESSION['email'];
     $usuario = obterUsuarioByEmail($email);
     return $usuario["admin"] == "S";
   }

 ?>
