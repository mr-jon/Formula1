<?php
	session_start(); $edit = (isset($_SESSION['email'])) ? true : false;
	include_once "funcao.php";
	$pilotos = obterPilotos();
 ?>
<?php include "header.php"; ?>
    <div class="container">
      <div class="row mt-5">
      	<div class="col-md-8">
      		<h1>Pilotos</h1>
      	</div>
      </div>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Pais</th>
            <th scope="col">Equipe</th>
            <th scope="col">Pontuação</th>
          </tr>
        </thead>
        <tbody>
			<?php foreach ($pilotos as $piloto): ?>
            <tr>
                <td scope="col"><?= $piloto['codPiloto'] ?></td>
                <td scope="col"><?= $piloto['nome'] ?></td>
                <td scope="col"><?= $piloto['pais_nome'] ?></td>
                <td scope="col"><?= $piloto['equipe_nome'] ?></td>
                <td scope="col"><?= $piloto['pontos_piloto'] ?></td>
            </tr>
			<?php endforeach; ?>
        </tbody>
      </table>
    </div>
<?php include "footer.php"; ?>