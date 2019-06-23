<?php
	session_start(); $edit = (isset($_SESSION['email'])) ? true : false;
	include_once "funcao.php";
	if (isset($_POST['codGp'])) {
		$gp = $_POST['codGp'];
	}else{
		$gp = $_GET['id'];
	}
	$pilotos = array();
	$pilotos = obterPilotosRankingPorGP($gp);
?>
<?php include "header.php"; ?>
    <div class="container">
      <div class="row mt-5">
      	<div class="col-md-8">
      		<h1>RANKING POR GP</h1>
      	</div>
				<?php if ($edit): ?>
          <div class="col-md-4 text-right">
            <a class="btn btn-danger" href="cadastrar-ptsgp.php"><i class="fa fa-plus"></i> Adicionar PTS</a>
          </div>
        <?php endif ?>
			</div>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">POS</th>
            <th scope="col">PILOTO</th>
            <th scope="col">PAIS</th>
            <th scope="col">EQUIPE</th>
            <th scope="col">PTS</th>
						<?php if ($edit): ?>
            	<th scope="col">AÇÃO</th>
            <?php endif ?>
          </tr>
        </thead>
        <tbody>
				<?php $cont=1; ?>

				<?php foreach ($pilotos as $piloto): ?>
            <tr>
                <td scope="col"><?= $cont++ ?></td>
                <td scope="col"><?= $piloto['nome'] ?></td>
                <td scope="col"><?= $piloto['pais_nome1'] ?></td>
                <td scope="col"><?= $piloto['equipe_nome1'] ?></td>
                <td scope="col"><?= $piloto['pontos_piloto1'] ?></td>
								<?php if ($edit): ?>
	                <td scope="col">
	                	<!-- <a class="text-warning" href="editar-rankinggp.php?id=<?= $piloto['codPiloto'] ?>&id1=<?= $piloto['codGp'] ?>"><i class="fas fa-edit"></i></a> | -->
	                	<a class="text-danger" href="deletar-rankinggp.php?id=<?= $piloto['codPiloto'] ?>&id1=<?= $piloto['codGp'] ?>"><i class="fas fa-trash"></i></a>
	                </td>
                <?php endif ?>

            </tr>
				<?php endforeach; ?>
        </tbody>
      </table>
    </div>
<?php include "footer.php"; ?>
