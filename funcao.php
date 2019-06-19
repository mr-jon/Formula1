<?php
  function obterConexao() {
    $conexao = mysqli_connect("localhost", "root", "root", "formula1");
    mysqli_set_charset($conexao, 'utf8');
    return $conexao;
  }

  function obterUsuarioByEmail($email) {
    $conexao = obterConexao();
    $sql = "select * from usuario where email = ?";
    $sentenca = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($sentenca, "s", $email);
    mysqli_stmt_execute($sentenca);
    $resultado = mysqli_stmt_get_result($sentenca);
    $usuario = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $usuario;
  }

   function checkAdmin() {
     if ( session_status() !== PHP_SESSION_ACTIVE ) {
         session_start();
     }
     if (!isset($_SESSION['email'])) {
       return false;
     }
     $email = $_SESSION['email'];
     $usuario = obterUsuarioByEmail($email);
     return $usuario["admin"] == "S";
   }



   function salvarNovoPiloto($piloto) {
    $conexao = obterConexao();
    $sql = "insert into piloto (codPiloto, codEquipe, codPais, nome) values (?, ?, ?, ?)";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "sssssi", $piloto['codPiloto'], $piloto['codEquipe'], $piloto['codPais'], $piloto['nome']);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }

  function obterPilotos() {
    $conexao = obterConexao();
    $resultado = mysqli_query($conexao,
            "SELECT piloto.*, equipe.nome as equipe_nome, pais.nome as pais_nome, pilotogp.pts as pontos_piloto FROM piloto
            JOIN equipe ON equipe.codEquip = piloto.codEquip 
            JOIN pais ON pais.codPais = piloto.codPais
            JOIN pilotogp ON pilotogp.codPiloto = piloto.codPiloto
            ");
    $pilotos = array();
    if ($resultado) {
      $pilotos = mysqli_fetch_all($resultado,
          MYSQLI_ASSOC);
    }
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $pilotos;
  }

  

 ?>
