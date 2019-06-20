<?php
	session_start(); $edit = (isset($_SESSION['email'])) ? true : false;
	include_once "funcao.php";
	$paises = obterPaises();
 ?>
<?php include "header.php"; ?>
    <div class="container">
      <div class="row mt-5">
      	<div class="col-md-8">
      		<h1>Cadastro de Países</h1>
      	</div>
      	<?php if ($edit): ?>
	      	<div class="col-md-4 text-right">
	      		<a class="btn btn-danger" href="cadastrar-pais.php"><i class="fa fa-plus"></i> Novo País</a>
	      	</div>
      	<?php endif ?>
      </div>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <?php if ($edit): ?>
            	<th scope="col">Ação</th>
            <?php endif ?>
          </tr>
        </thead>
        <tbody>
			<?php foreach ($paises as $pais): ?>
            <tr>
                <td scope="col"><?= $pais['codPais'] ?></td>
                <td scope="col"><?= $pais['nome'] ?></td>
                <?php if ($edit): ?>
	                <td scope="col">
	                	<a class="text-danger" href="editar-paises.php?id=<?= $pais['codPais'] ?>"><i class="fas fa-edit"></i></a> |
	                	<a class="text-danger" href="deletar-pais.php?id=<?= $pais['codPais'] ?>"><i class="fas fa-trash"></i></a>
	                </td>
                <?php endif ?>
            </tr>
			<?php endforeach; ?>
        </tbody>
      </table>
    </div>
<?php include "footer.php"; ?>
