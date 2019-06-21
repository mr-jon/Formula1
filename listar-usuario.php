<?php
	session_start(); $edit = (isset($_SESSION['email'])) ? true : false;
	include_once "funcao.php";
	$usuarios = obterUsuarios();
 ?>
<?php include "header.php"; ?>
    <div class="container">
      <div class="row mt-5">
      	<div class="col-md-8">
      		<h1>LISTAGEM DE USUÁRIOS</h1>
      	</div>
      	<?php if ($edit): ?>
	      	<div class="col-md-4 text-right">
	      		<a class="btn btn-danger" href="cadastrar-usuario.php"><i class="fa fa-plus"></i> NOVO USUÁRIO</a>
	      	</div>
      	<?php endif ?>
      </div>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">COD</th>
            <th scope="col">NOME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">SENHA</th>
            <?php if ($edit): ?>
            	<th scope="col">AÇÃO</th>
            <?php endif ?>
          </tr>
        </thead>
        <tbody>
		  	<?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td scope="col"><?= $usuario['id'] ?></td>
                <td scope="col"><?= $usuario['nome'] ?></td>
                <td scope="col"><?= $usuario['email'] ?></td>
                <td scope="col"><?= $usuario['senha'] ?></td>
                <?php if ($edit): ?>
	                <td scope="col">
	                	<a class="text-warning" href="editar-usuario.php?id=<?= $usuario['id'] ?>"><i class="fas fa-edit"></i></a> |
	                	<a class="text-danger" href="deletar-usuario.php?id=<?= $usuario['id'] ?>"><i class="fas fa-trash"></i></a>
	                </td>
                <?php endif ?>
            </tr>
			<?php endforeach; ?>
        </tbody>
      </table>
    </div>
<?php include "footer.php"; ?>
