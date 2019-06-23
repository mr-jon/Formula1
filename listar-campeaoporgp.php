<?php
	session_start();
	if (! isset($_SESSION['email'])) {
		$erro = "Usuário não logado";
		include_once "login.php";
		exit(0);
	}
	include_once "funcao.php";
	//$usuario = obterUsuarioByEmail($_SESSION['email']);


//	if (!isset($ptsGp)) {
//	  $ptsGp = array();
//	  $ptsGp['codGp'] = 0;
//	  $ptsGp['codPiloto'] = "";
//	  $ptsGp['codEquip'] = "";
//	  $ptsGp['pts'] = "";
//	}
	// $categorias = obterCategorias();
	$gps = obterGp();
	//$pilotos = obterPilotos();
	//$equipes = obterEquipes();

?>
<?php include 'header.php'; ?>
<div class="container">
	<div class="row mt-5">
		<div class="col-md-12">
			<h1>LISTAGEM POSIÇÃO POR GP</h1>
			<form action="listar-rankinggp.php" method="post">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="gp">GP</label>
						<select id="gp" class="form-control" name="codGp">
						<option selected>Selecione o GP</option>
							<?php foreach ($gps as $gp): ?>
								<?php $selected = ($gp["codGp"] == $ptsGp["codGp"]) ? "selected" : ""; ?>
								<option <?= $selected ?> value="<?= $gp['codGp'] ?>"><?= $gp['nome'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
				<button type="submit" class="btn btn-lg btn-block btn-danger">Listar Posição por GP</button>
			</form>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>
