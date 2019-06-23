<?php
  include_once "funcao.php";

  $id = $_GET['id'];
  $id1 = $_GET['id1'];
  $ptsGp = obterPilotoGPById($id, $id1);

  include_once "cadastrar-ptsgp.php";
 ?>
