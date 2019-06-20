<?php
	session_start();
	if (! isset($_SESSION['email'])) {
		$erro = "Usuário não logado";
		include_once "login.php";
		exit(0);
	}
	include_once "funcao.php";
	//$usuario = obterUsuarioByEmail($_SESSION['email']);


	if (!isset($usuario)) {
	  $usuario = array();
	  $usuario['id'] = 0;
	  $usuario['nome'] = "";
    $usuario['email'] = "";
    $usuario['senha'] = "";
    $usuario['admin'] = "";
	}
	// $categorias = obterCategorias();

?>
<?php include 'header.php'; ?>
<div class="container">
	<div class="row mt-5">
		<div class="col-md-12">
			<h1>Cadastrar Usuário</h1>
			<form action="salvar-usuario.php" method="post">
				<div class="form-group">
					<!-- <label for="id">ID</label> -->
					<input hidden type="text" class="form-control" id="id" name="id" value="<?= $usuario['id'] ?>">
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="i-nome">Nome</label>
						<input type="text" class="form-control" id="nome" placeholder="Informe o nome do Usuário" name="nome" value="<?= $usuario['nome'] ?>">
					</div>
				</div>
        <div class="form-row">
					<div class="form-group col-md-6">
						<label for="i-nome">E-mail</label>
						<input type="email" class="form-control" id="email" placeholder="Informe seu E-mail" name="email" value="<?= $usuario['email'] ?>">
					</div>
				</div>
        <div class="form-row">
					<div class="form-group col-md-6">
						<label for="i-nome">Senha</label>
						<input type="password" class="form-control" id="senha" placeholder="Informe a Senha do Usuário" name="senha" value="<?= $usuario['senha'] ?>">
					</div>
				</div>
				<button type="submit" class="btn btn-lg btn-block btn-danger">Cadastrar</button>
			</form>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>
