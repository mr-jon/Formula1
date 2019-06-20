<?php
  include_once "funcao.php";
  $id = $_GET['id'];
  removerPais($id);
  header("location: listar-paises.php");
  exit();
 ?>
