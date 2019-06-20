<?php
  include_once "funcao.php";
  $id = $_GET['id'];
  removerPiloto($id);
  header("location: listar-pilotos.php");
  exit();
 ?>
