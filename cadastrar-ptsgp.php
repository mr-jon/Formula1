<?php
	session_start();
	if (! isset($_SESSION['email'])) {
		$erro = "Usuário não logado";
		include_once "login.php";
		exit(0);
	}
	include_once "funcao.php";
	$usuario = obterUsuarioByEmail($_SESSION['email']);

	//var_dump($ptsGp);
	if (!isset($ptsGp)) {
	  $ptsGp = array();
	  $ptsGp['codGp'] = 0;
	  $ptsGp['codPiloto'] = "";
	  $ptsGp['codEquip'] = "";
	  $ptsGp['pts'] = "";
	}
	// $categorias = obterCategorias();
	$gps = obterGp();
	$pilotos = obterPilotos();
	$equipes = obterEquipes();

?>
<?php include 'header.php'; ?>
<div class="container">
	<div class="row mt-5">
		<div class="col-md-12">
			<h1>Cadastrar Pontuação no GP</h1>
			<form action="salvar-ptsgp.php" method="post">
				<div class="form-group">
					<!-- <label for="id">ID</label> -->
					<input hidden type="text" class="form-control" id="id" name="id" value="<?= $ptsGp['codGp'] ?>">
				</div>
				<div class="form-row">

					<div class="form-group col-md-5">
						<label for="gp">GP</label>
						<select id="gp" class="form-control" name="codGp">
						<option selected>Selecione o GP</option>
							<?php foreach ($gps as $gp): ?>
								<?php $selected = ($gp["codGp"] == $ptsGp["codGp"]) ? "selected" : ""; ?>
								<option <?= $selected ?> value="<?= $gp['codGp'] ?>"><?= $gp['nome'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group col-md-5">
						<label for="piloto">Piloto</label>
						<select id="piloto" class="form-control" name="codPiloto">
						<option selected>Selecione o Piloto</option>
							<?php foreach ($pilotos as $piloto): ?>
								<?php $selected = ($piloto["codPiloto"] == $ptsGp["codPiloto"]) ? "selected" : ""; ?>
								<option <?= $selected ?> value="<?= $piloto['codPiloto'] ?>"><?= $piloto['nome'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="pts">PTS</label>
						<input type="number" class="form-control" id="pts" placeholder="pontuação do piloto no GP" name="pts" value="<?= $ptsGp['pts'] ?>">
					</div>
				</div>


				<button type="submit" class="btn btn-lg btn-block btn-danger">Cadastrar</button>
			</form>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>
