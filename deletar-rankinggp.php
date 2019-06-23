<?php
  include_once "funcao.php";
  $id = $_GET['id'];
  $id1 = $_GET['id1'];
  removerPilotoGP($id, $id1);
  header("location: listar-rankinggp.php?id=".$id1);
  exit();
 ?>
