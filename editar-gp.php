<?php
  include_once "funcao.php";

  $id = $_GET['id'];
  $gp = obterGpById($id);

  include_once "cadastrar-gp.php";
 ?>
