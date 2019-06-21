<?php
	session_start(); $edit = (isset($_SESSION['email'])) ? true : false;
	include_once "funcao.php";
	$pilotos = obterPilotos();
 ?>
<?php include "header.php"; ?>
    <div class="container">
      <div class="row mt-5">
      	<div class="col-md-8">
      		<h1>LISTAGEM DE PILOTOS</h1>
      	</div>
      	<?php if ($edit): ?>
	      	<div class="col-md-4 text-right">
	      		<a class="btn btn-danger" href="cadastrar-piloto.php"><i class="fa fa-plus"></i> NOVO PILOTO</a>
	      	</div>
      	<?php endif ?>
      </div>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">COD</th>
            <th scope="col">NOME</th>
            <th scope="col">PAIS</th>
            <th scope="col">EQUIPE</th>
            <?php if ($edit): ?>
            	<th scope="col">AÇÃO</th>
            <?php endif ?>
          </tr>
        </thead>
        <tbody>
			<?php foreach ($pilotos as $piloto): ?>
            <tr>
                <td scope="col"><?= $piloto['codPiloto'] ?></td>
                <td scope="col"><?= $piloto['nome'] ?></td>
                <td scope="col"><?= $piloto['pais_nome'] ?></td>
                <td scope="col"><?= $piloto['equipe_nome'] ?></td>
                <?php if ($edit): ?>
	                <td scope="col">
	                	<a class="text-warning" href="editar-piloto.php?id=<?= $piloto['codPiloto'] ?>"><i class="fas fa-edit"></i></a> |
	                	<a class="text-danger" href="deletar-piloto.php?id=<?= $piloto['codPiloto'] ?>"><i class="fas fa-trash"></i></a>
	                </td>
                <?php endif ?>
            </tr>
			<?php endforeach; ?>
        </tbody>
      </table>
    </div>
<?php include "footer.php"; ?>
