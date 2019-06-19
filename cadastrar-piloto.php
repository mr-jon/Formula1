<?php
	session_start();
	if (! isset($_SESSION['email'])) {
		$erro = "Usuário não logado";
		include_once "login.php";
		exit(0);
	}
	include_once "funcao.php";
	$usuario = obterUsuarioByEmail($_SESSION['email']);
?>
<?php include 'header.php'; ?>
<div class="container">
	<div class="row mt-5">
		<div class="col-md-12">
			<h1>Cadastrar Piloto</h1>
			<form action="validar-cadastros.php" method="post">
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputEmail4">Nome</label>
			      <input type="email" class="form-control" id="inputNome4" placeholder="Informe o nome do piloto" name="nome">
			    </div>
			    
			    <div class="form-group col-md-3">
			      <label for="inputPais">Equipe</label>
			      <select id="inputPais" class="form-control">
			        <option>Red Bull</option>
			        <option>Ferrari</option>
			        <option>Maclaren</option>
			        <option>Mercedes</option>
			        <option selected>Selecione a Equipe do piloto</option>
			      </select>
			    </div>

			    <div class="form-group col-md-3">
			      <label for="inputPais">País</label>
			      <select id="inputPais" class="form-control">
			        <option>Austrália</option>
			        <option>Bahrein</option>
			        <option>Brasil</option>
			        <option>Canadá</option>
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