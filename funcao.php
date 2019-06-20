<?php
  function obterConexao() {
    $conexao = mysqli_connect("localhost", "root", "", "formula1");
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
    $sql = "insert into piloto (codPiloto, codEquip, codPais, nome) values (?, ?, ?, ?)";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "iiis", $piloto['codPiloto'], $piloto['codEquip'], $piloto['codPais'], $piloto['nome']);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }

  function obterPilotos() {
    $conexao = obterConexao();
    $resultado = mysqli_query($conexao,
            "SELECT piloto.*, equipe.nome as equipe_nome, pais.nome as pais_nome FROM piloto
            JOIN equipe ON equipe.codEquip = piloto.codEquip
            JOIN pais ON pais.codPais = piloto.codPais
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

  function obterPilotosRanking() {
    $conexao = obterConexao();
    $resultado = mysqli_query($conexao,
            "SELECT piloto.*, equipe.nome as equipe_nome, pais.nome as pais_nome, sum(pilotogp.pts) as pontos_piloto FROM piloto
            JOIN equipe ON equipe.codEquip = piloto.codEquip
            JOIN pais ON pais.codPais = piloto.codPais
            JOIN pilotogp ON pilotogp.codPiloto = piloto.codPiloto
            GROUP BY piloto.codPiloto
            HAVING sum(pilotogp.pts)
            ORDER BY pontos_piloto desc
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

  function obterPilotoById($id) {
    $conexao = obterConexao();
    $sql = "select * from piloto where codPiloto=?";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "i", $id);
    mysqli_stmt_execute($sentenca);
    $resultado = mysqli_stmt_get_result($sentenca);
    $pais = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $pais;
  }

  function alterarPiloto($piloto) {
    $conexao = obterConexao();
    $sql = "update piloto set codEquip=?, codPais=?, nome=? where id=?";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "iisi", $piloto['codEquip'], $piloto['codPais'], $piloto['nome'], $piloto['id']);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }

  function removerPiloto($id) {
    $conexao = obterConexao();
    $sql = "delete from piloto where codPiloto=?";
    $sentenca = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($sentenca, "i", $id);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }


  function obterEquipes() {
    $conexao = obterConexao();
    $resultado = mysqli_query($conexao,
            "SELECT * FROM equipe");
    $equipes = array();
    if ($resultado) {
      $equipes = mysqli_fetch_all($resultado,
          MYSQLI_ASSOC);
    }
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $equipes;
  }

  function obterPaises() {
    $conexao = obterConexao();
    $resultado = mysqli_query($conexao,
            "SELECT * FROM pais");
    $paises = array();
    if ($resultado) {
      $paises = mysqli_fetch_all($resultado,
          MYSQLI_ASSOC);
    }
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $paises;
  }

  function removerPais($id) {
    $conexao = obterConexao();
    $sql = "delete from pais where codPais=?";
    $sentenca = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($sentenca, "i", $id);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }

  function alterarPais($pais) {
    $conexao = obterConexao();
    $sql = "update pais set nome=? where codPais=?";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "si", $pais['nome'], $pais['codPais']);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }

  function obterPaisById($id) {
    $conexao = obterConexao();
    $sql = "select * from pais where codPais=?";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "i", $id);
    mysqli_stmt_execute($sentenca);
    $resultado = mysqli_stmt_get_result($sentenca);
    $pais = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $pais;
  }

  function salvarPais($pais) {
    $conexao = obterConexao();
    $sql = "insert into pais (nome) values (?)";
    $sentenca = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($sentenca, "s", $pais["nome"]);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }

 ?>
