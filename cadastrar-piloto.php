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
	  $piloto['codPiloto'] = 0;
	  $piloto['codEquip'] = "";
	  $piloto['codPais'] = "";
	  $piloto['nome'] = "";
	}
	// $categorias = obterCategorias();

	$equipes = obterEquipes();
	$paises = obterPaises();

?>
<?php include 'header.php'; ?>
<div class="container">
	<div class="row mt-5">
		<div class="col-md-12">
			<h1>Cadastrar Piloto</h1>
			<form action="salvar-piloto.php" method="post">
				<div class="form-group">
					<!-- <label for="id">ID</label> -->
					<input hidden type="text" class="form-control" id="id" name="id" value="<?= $piloto['codPiloto'] ?>">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nome">Nome</label>
						<input type="text" class="form-control" id="nome" placeholder="Informe o nome do piloto" name="nome" value="<?= $piloto['nome'] ?>">
					</div>

					<div class="form-group col-md-3">
						<label for="equipe">Equipe</label>
						<select id="equipe" class="form-control" name="codEquip">
							<option selected>Selecione a Equipe do piloto</option>
							<?php foreach ($equipes as $equipe): ?>
								<?php $selected = ($equipe["codEquip"] == $piloto["codEquip"]) ? "selected" : ""; ?>
								<option <?= $selected ?> value="<?= $equipe['codEquip'] ?>"><?= $equipe['nome'] ?></option>
							<?php endforeach ?>

						</select>
					</div>

					<div class="form-group col-md-3">
						<label for="pais">País</label>
						<select id="pais" class="form-control" name="codPais">
							<option selected>Selecione o país do piloto</option>
							<?php foreach ($paises as $pais): ?>
								<?php $selected = ($pais["codPais"] == $piloto["codPais"]) ? "selected" : ""; ?>
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
