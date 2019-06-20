<?php
  include_once "funcao.php";

  $id = $_GET['id'];
  $equipe = obterEquipeById($id);

  include_once "cadastrar-equipe.php";
 ?>
