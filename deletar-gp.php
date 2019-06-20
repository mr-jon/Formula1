<?php
  include_once "funcao.php";
  $id = $_GET['id'];
  removerGp($id);
  header("location: listar-gp.php");
  exit();
 ?>
