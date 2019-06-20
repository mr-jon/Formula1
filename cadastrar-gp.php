<?php
	session_start();
	if (! isset($_SESSION['email'])) {
		$erro = "Usuário não logado";
		include_once "login.php";
		exit(0);
	}
	include_once "funcao.php";
	$usuario = obterUsuarioByEmail($_SESSION['email']);


	if (!isset($gp)) {
	  $gp = array();
	  $gp['codGp'] = 0;
	  $gp['codPais'] = "";
	  $gp['nome'] = "";
	}
	// $categorias = obterCategorias();
	$paises = obterPaises();

?>
<?php include 'header.php'; ?>
<div class="container">
	<div class="row mt-5">
		<div class="col-md-12">
			<h1>Cadastrar GP</h1>
			<form action="salvar-gp.php" method="post">
				<div class="form-group">
					<label for="id">ID</label>
					<input readonly type="text" class="form-control" id="id" name="id" value="<?= $gp['codGp'] ?>">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nome">Nome GP</label>
						<input type="text" class="form-control" id="nome" placeholder="Informe o nome do GP" name="nome" value="<?= $gp['nome'] ?>">
					</div>

					<div class="form-group col-md-3">
						<label for="pais">País do GP</label>
						<select id="pais" class="form-control" name="codPais">
						<option selected>Selecione o País do GP</option>
							<?php foreach ($paises as $pais): ?>
								<?php $selected = ($pais["codPais"] == $gp["codPais"]) ? "selected" : ""; ?>
								<option <?= $selected ?> value="<?= $pais['codPais'] ?>"><?= $pais['nome'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>


				<button type="submit" class="btn btn-lg btn-block btn-danger">Cadastrar</button>
			</form>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>
