<?php
	session_start();
	if (! isset($_SESSION['email'])) {
		$erro = "Usuário não logado";
		include_once "login.php";
		exit(0);
	}
	include_once "funcao.php";


	if (!isset($equipe)) {
	  $equipe = array();
	  $equipe['codEquip'] = 0;
	  $equipe['codPais'] = "";
	  $equipe['nome'] = "";
	}

	$paises = obterPaises();

?>
<?php include 'header.php'; ?>
<div class="container">
	<div class="row mt-5">
		<div class="col-md-12">
			<h1>Cadastrar Equipe</h1>
			<form action="salvar-equipe.php" method="post">
				<div class="form-group">
					<!-- <label for="id">ID</label> -->
					<input hidden type="text" class="form-control" id="id" name="id" value="<?= $equipe['codEquip'] ?>">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nome">Nome</label>
						<input type="text" class="form-control" id="nome" placeholder="Informe o nome da equipe" name="nome" value="<?= $equipe['nome'] ?>">
					</div>

					<div class="form-group col-md-6">
						<label for="pais">País</label>
						<select id="pais" class="form-control" name="codPais">
							<option selected>Selecione o País da Equipe</option>
							<?php foreach ($paises as $pais): ?>
								<?php $selected = ($pais["codPais"] == $equipe["codPais"]) ? "selected" : ""; ?>
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
