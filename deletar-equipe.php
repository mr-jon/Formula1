<?php
  include_once "funcao.php";
  $id = $_GET['id'];
  removerEquipe($id);
  header("location: listar-equipes.php");
  exit();
 ?>
