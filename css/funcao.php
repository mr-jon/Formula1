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

  function salvarPtsGp($ptsGp) {
    $conexao = obterConexao();
    $sql = "insert into pilotogp (codGp, codPiloto, codEquip, pts) values (?, ?, ?, ?)";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "iiis", $ptsGp['codGp'], $ptsGp['codPiloto'], $ptsGp['codEquip'], $ptsGp['pts']);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }

    function obterPtsPilotoGp($id) {
    $conexao = obterConexao();
    $sql = "select * from pilotogp where codPiloto=?";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "i", $id);
    mysqli_stmt_execute($sentenca);
    $resultado = mysqli_stmt_get_result($sentenca);
    $gp = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $gp;
  }

  function removerPtsGp($id) {
    $conexao = obterConexao();
    $sql = "delete from pilotogp where codGp=?";
    $sentenca = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($sentenca, "i", $id);
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
            -- HAVING sum(pilotogp.pts)
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

  function obterPilotosRankingPorGP($gp) {
    $conexao = obterConexao();
    $sql = "SELECT piloto.nome, equipe.nome as equipe_nome1, pais.nome as pais_nome1, sum(pilotogp.pts) as pontos_piloto1 FROM piloto
            JOIN equipe ON equipe.codEquip = piloto.codEquip
            JOIN pais ON pais.codPais = piloto.codPais
            JOIN pilotogp ON pilotogp.codPiloto = piloto.codPiloto
            WHERE pilotogp.codGp = ?
            GROUP BY piloto.codPiloto, pilotogp.codGp
            ORDER BY pontos_piloto1 DESC";
    $sentenca = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($sentenca, "i", $gp);
    mysqli_stmt_execute($sentenca);
    $resultado = mysqli_stmt_get_result($sentenca);
    $gps1 = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    //var_dump($gps1);
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $gps1;
}

  function obterPilotoById($id) {
    $conexao = obterConexao();
    $sql = "select * from piloto where codPiloto=?";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "i", $id);
    mysqli_stmt_execute($sentenca);
    $resultado = mysqli_stmt_get_result($sentenca);
    $piloto = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $piloto;
  }

  function obterUsuarioById($id) {
    $conexao = obterConexao();
    $sql = "select * from usuario where id=?";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "i", $id);
    mysqli_stmt_execute($sentenca);
    $resultado = mysqli_stmt_get_result($sentenca);
    $usuario = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $usuario;
  }

  function alterarPiloto($piloto) {
    $conexao = obterConexao();
    $sql = "update piloto set codEquip=?, codPais=?, nome=? where CodPiloto=?";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "iisi", $piloto['codEquip'], $piloto['codPais'], $piloto['nome'], $piloto['codPiloto']);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }

  function alterarUsuario($usuario) {
    $conexao = obterConexao();
    $sql = "update usuario set nome=?, email=?, senha=? where id=?";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "sssi", $usuario['nome'], $usuario['email'], $usuario['senha'], $usuario['id']);
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

  function removerUsuario($id) {
    $conexao = obterConexao();
    $sql = "delete from usuario where id=?";
    $sentenca = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($sentenca, "i", $id);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }

  function obterUsuarios() {
    $conexao = obterConexao();
    $resultado = mysqli_query($conexao,
            "SELECT * FROM usuario");
    $usuarios = array();
    if ($resultado) {
      $usuarios = mysqli_fetch_all($resultado,
          MYSQLI_ASSOC);
    }
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $usuarios;
  }


  function obterEquipes() {
    $conexao = obterConexao();
    $resultado = mysqli_query($conexao,
            "SELECT equipe.*, pais.nome as nome_pais, pais.codPais FROM equipe
            JOIN pais ON pais.codPais = equipe.codPais
            ORDER BY codEquip
            ");
    $equipes = array();
    if ($resultado) {
      $equipes = mysqli_fetch_all($resultado,
          MYSQLI_ASSOC);
    }
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $equipes;
  }

  function obterEquipeById($id) {
    $conexao = obterConexao();
    $sql = "select * from equipe where codEquip=?";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "i", $id);
    mysqli_stmt_execute($sentenca);
    $resultado = mysqli_stmt_get_result($sentenca);
    $equipe = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $equipe;
  }

  function salvarEquipe($equipe) {
    $conexao = obterConexao();
    $sql = "insert into equipe (codEquip, codPais, nome) values (?, ?, ?)";
    $sentenca = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($sentenca, "iis", $equipe["codEquip"], $equipe["codPais"], $equipe["nome"]);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }


  function alterarEquipe($equipe) {
    $conexao = obterConexao();
    $sql = "update equipe set codPais=?, nome=? where codEquip=?";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "isi", $equipe['codPais'], $equipe['nome'], $equipe['codEquip']);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }

  function removerEquipe($id) {
    $conexao = obterConexao();
    $sql = "delete from equipe where codEquip=?";
    $sentenca = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($sentenca, "i", $id);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
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

  function obterGp() {
    $conexao = obterConexao();
    $resultado = mysqli_query($conexao,
            "SELECT gp.*, pais.nome as pais_nome FROM gp
            JOIN pais ON gp.codPais = pais.codPais
            ORDER BY gp.codGp");
    $gp = array();
    if ($resultado) {
      $gp = mysqli_fetch_all($resultado,
          MYSQLI_ASSOC);
    }
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $gp;
  }


  function removerPais($id) {
    $conexao = obterConexao();
    $sql = "delete from pais where codPais=?";
    $sentenca = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($sentenca, "i", $id);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }

  function removerGp($id) {
    $conexao = obterConexao();
    $sql = "delete from gp where codGp=?";
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

  function alterarGp($gp) {
    $conexao = obterConexao();
    $sql = "update gp set codPais=?, nome=? where codGp=?";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "isi", $gp['codPais'], $gp['nome'], $gp['codGp']);
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

  function obterGpById($id) {
    $conexao = obterConexao();
    $sql = "select * from gp where codGp=?";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "i", $id);
    mysqli_stmt_execute($sentenca);
    $resultado = mysqli_stmt_get_result($sentenca);
    $gp = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $gp;
  }

  function salvarPais($pais) {
    $conexao = obterConexao();
    $sql = "insert into pais (nome) values (?)";
    $sentenca = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($sentenca, "s", $pais["nome"]);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }

  function salvarGp($gp) {
    $conexao = obterConexao();
    $sql = "insert into gp (codGp, codPais, nome) values (?, ?, ?)";
    $sentenca = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($sentenca, "iis", $gp["codGp"], $gp["codPais"], $gp["nome"]);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }

  function salvarUsuario($usuario) {
    $conexao = obterConexao();
    $sql = "insert into usuario (nome, email, senha) values (?, ?, ?)";
    $sentenca = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($sentenca, "sss", $usuario["nome"], $usuario["email"], $usuario["senha"]);
    mysqli_stmt_execute($sentenca);
    mysqli_close($conexao);
  }

 ?>
