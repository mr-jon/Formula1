<?php
  include_once "funcao.php";


  $piloto = array();
  $piloto['codPiloto'] = $_POST['id'];
  $piloto['codEquip'] = $_POST['codEquip'];
  $piloto['codPais'] = $_POST['codPais'];
  $piloto['nome'] = $_POST['nome'];
  // print_r($piloto);
  if ($piloto['codPiloto'] == 0) {
    salvarNovoPiloto($piloto);
  } else {
    alterarPiloto($piloto);
  }

  header("location: listar-pilotos.php");
  exit();

 ?>
