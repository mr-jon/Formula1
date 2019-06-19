<?php
  include_once "funcao.php";


  $piloto = array();
  $piloto['id'] = $_POST['id'];
  $piloto['nome'] = $_POST['nome'];
  $piloto['codPais'] = $_POST['codPais'];
  $piloto['codEquipe'] = $_POST['codEquipe'];
  //print_r($piloto);
  if ($piloto['id'] == 0) {
    salvarNovoPiloto($piloto);
  } else {
    alterarPiloto($piloto);
  }

  header("location: listar-pilotos.php");
  exit();

 ?>
