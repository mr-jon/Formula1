<?php
	session_start(); $edit = (isset($_SESSION['email'])) ? true : false;
	include_once "funcao.php";
	$gps = obterGp();
 ?>
<?php include "header.php"; ?>
    <div class="container">
      <div class="row mt-5">
      	<div class="col-md-8">
      		<h1>LISTAGEM DE GP'S</h1>
      	</div>
      	<?php if ($edit): ?>
	      	<div class="col-md-4 text-right">
	      		<a class="btn btn-danger" href="cadastrar-gp.php"><i class="fa fa-plus"></i> NOVO GP</a>
	      	</div>
      	<?php endif ?>
      </div>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">COD</th>
            <th scope="col">PAIS</th>
            <th scope="col">NOME GP</th>
            <?php if ($edit): ?>
            	<th scope="col">AÇÃO</th>
            <?php endif ?>
          </tr>
        </thead>
        <tbody>
			<?php foreach ($gps as $gp): ?>
            <tr>
								<td scope="col"><?= $gp['codGp'] ?></td>
                <td scope="col"><?= $gp['pais_nome'] ?></td>
                <td scope="col"><?= $gp['nome'] ?></td>
                <?php if ($edit): ?>
	                <td scope="col">
	                	<a class="text-danger" href="editar-gp.php?id=<?= $gp['codGp'] ?>"><i class="fas fa-edit"></i></a> |
	                	<a class="text-danger" href="deletar-gp.php?id=<?= $gp['codGp'] ?>"><i class="fas fa-trash"></i></a>
	                </td>
                <?php endif ?>
            </tr>
			<?php endforeach; ?>
        </tbody>
      </table>
    </div>
<?php include "footer.php"; ?>
