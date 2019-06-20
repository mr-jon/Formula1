<?php
  include_once "funcao.php";

  $id = $_GET['id'];
  $pais = obterPaisById($id);

  include_once "cadastrar-pais.php";
 ?>
