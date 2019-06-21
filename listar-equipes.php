<?php
	session_start(); $edit = (isset($_SESSION['email'])) ? true : false;
	include_once "funcao.php";
	$equipes = obterEquipes();
 ?>
<?php include "header.php"; ?>
    <div class="container">
      <div class="row mt-5">
      	<div class="col-md-8">
      		<h1>LISTAGEM DE EQUIPES</h1>
      	</div>
      	<?php if ($edit): ?>
	      	<div class="col-md-4 text-right">
	      		<a class="btn btn-danger" href="cadastrar-equipe.php"><i class="fa fa-plus"></i> NOVA EQUIPE</a>
	      	</div>
      	<?php endif ?>
      </div>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">COD</th>
            <th scope="col">EQUIPES</th>
            <th scope="col">PAÍS</th>
            <?php if ($edit): ?>
            	<th scope="col">AÇÃO</th>
            <?php endif ?>
          </tr>
        </thead>
        <tbody>
			<?php foreach ($equipes as $equipe): ?>
            <tr>
                <td scope="col"><?= $equipe['codEquip'] ?></td>
                <td scope="col"><?= $equipe['nome'] ?></td>
                <td scope="col"><?= $equipe['nome_pais'] ?></td>
                <?php if ($edit): ?>
	                <td scope="col">
	                	<a class="text-danger" href="editar-equipe.php?id=<?= $equipe['codEquip'] ?>"><i class="fas fa-edit"></i></a> | 
	                	<a class="text-danger" href="deletar-equipe.php?id=<?= $equipe['codEquip'] ?>"><i class="fas fa-trash"></i></a>
	                </td>
                <?php endif ?>
            </tr>
			<?php endforeach; ?>
        </tbody>
      </table>
    </div>
<?php include "footer.php"; ?>