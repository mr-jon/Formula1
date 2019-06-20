<?php
	session_start();
	if (! isset($_SESSION['email'])) {
		$erro = "Usuário não logado";
		include_once "login.php";
		exit(0);
	}
	include_once "funcao.php";
	$usuario = obterUsuarioByEmail($_SESSION['email']);


	if (!isset($piloto)) {
	  $piloto = array();
	  $piloto['id'] = 0;
	  $piloto['nome'] = "";
	  $piloto['equipe'] = "";
	  $piloto['pais'] = "";
	}
	// $categorias = obterCategorias();

	$equipes = obterEquipes();
	$paises = obterPaises();

?>
<pre>
	<?php var_dump($equipes); ?>
</pre>
<?php include 'header.php'; ?>
<div class="container">
	<div class="row mt-5">
		<div class="col-md-12">
			<h1>Cadastrar Piloto</h1>
			<form action="validar-cadastros.php" method="post">
				<div class="form-group">
					<label for="id">ID</label>
					<input readonly type="text" class="form-control" id="id" name="id" value="<?= $piloto['id'] ?>">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="i-nome">Nome</label>
						<input type="text" class="form-control" id="i-nome" placeholder="Informe o nome do piloto" name="nome">
					</div>

					<div class="form-group col-md-3">
						<label for="inputPais">Equipe</label>
						<select id="inputPais" class="form-control" name="codEquipe">
							<?php foreach ($equipes as $equipe): ?>
								<?php $selected = ($equipe["equipe_id"] == $piloto["equipe"]) ? "selected" : ""; ?>
								<option <?= $selected ?> value="<?= $equipe['equipe_id'] ?>"><?= $equipe['equipe_nome'] ?></option>
							<?php endforeach ?>
							
							<option selected>Selecione a Equipe do piloto</option>
						</select>
					</div>

					<div class="form-group col-md-3">
						<label for="inputPais">País</label>
						<select id="inputPais" class="form-control" name="codPais">
							<?php foreach ($paises as $pais): ?>
								<?php $selected = ($pais["pais_id"] == $piloto["pais"]) ? "selected" : ""; ?>
								<option <?= $selected ?> value="<?= $pais['pais_id'] ?>"><?= $pais['pais_nome'] ?></option>
							<?php endforeach ?>
							<option selected>Selecione o país do piloto</option>
						</select>
					</div>
				</div>


				<button type="submit" class="btn btn-lg btn-block btn-danger">Cadastrar</button>
			</form>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>