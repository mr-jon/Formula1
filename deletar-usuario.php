<?php
  include_once "funcao.php";
  $id = $_GET['id'];
  removerUsuario($id);
  header("location: listar-usuario.php");
  exit();
 ?>
