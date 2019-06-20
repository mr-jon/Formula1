<?php
	session_start(); $edit = (isset($_SESSION['email'])) ? true : false;
	include_once "funcao.php";
	$pilotos = obterPilotosRanking();
 ?>
<?php include "header.php"; ?>
    <div class="container">
      <div class="row mt-5">
      	<div class="col-md-8">
      		<h1>RANKING GERAL</h1>
      	</div>
      </div>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">POS</th>
            <th scope="col">NOME</th>
            <th scope="col">PAIS</th>
            <th scope="col">EQUIPE</th>
            <th scope="col">PTS</th>
          </tr>
        </thead>
        <tbody>
					<?php $cont=1; ?>
			<?php foreach ($pilotos as $piloto): ?>
            <tr>
                <td scope="col"><?= $cont++ ?></td>
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
