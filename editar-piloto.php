<?php
  include_once "funcao.php";

  $id = $_GET['id'];
  $piloto = obterPilotoById($id);

  include_once "cadastrar-piloto.php";
 ?>
