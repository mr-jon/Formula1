<?php
  include_once "funcao.php";


  $piloto = array();
  $piloto['id'] = $_POST['id'];
  $piloto['codEquipe'] = $_POST['codEquipe'];
  $piloto['codPais'] = $_POST['codPais'];
  $piloto['nome'] = $_POST['nome'];
  //print_r($piloto);
  if ($piloto['id'] == 0) {
    salvarNovoPiloto($piloto);
  } else {
    alterarPiloto($piloto);
  }

  header("location: listar-pilotos.php");
  exit();

 ?>
