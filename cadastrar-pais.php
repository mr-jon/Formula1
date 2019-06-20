<?php
	session_start();
	if (! isset($_SESSION['email'])) {
		$erro = "Usuário não logado";
		include_once "login.php";
		exit(0);
	}
	include_once "funcao.php";
	$usuario = obterUsuarioByEmail($_SESSION['email']);


	if (!isset($pais)) {
	  $pais = array();
	  $pais['codPais'] = 0;
	  $pais['nome'] = "";
	}
	// $categorias = obterCategorias();

?>
<?php include 'header.php'; ?>
<div class="container">
	<div class="row mt-5">
		<div class="col-md-12">
			<h1>Cadastrar País</h1>
			<form action="salvar-pais.php" method="post">
				<div class="form-group">
					<!-- <label for="id">ID</label> -->
					<input hidden type="text" class="form-control" id="id" name="id" value="<?= $pais['codPais'] ?>">
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="i-nome">Nome</label>
						<input type="text" class="form-control" id="nome" placeholder="Informe o nome do País" name="nome" value="<?= $pais['nome'] ?>">
					</div>
				</div>
				<button type="submit" class="btn btn-lg btn-block btn-danger">Cadastrar</button>
			</form>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>
