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
		<div class="row">
			
			<div class="col-md-3 text-center">
				<a href="cadastrar-piloto.php">
					<div class="card">
					 	<div class="card-img-top"><i class="fas fa-cart-plus display-2 pt-5 pb-3"></i></div>
					 	<div class="card-body">
					    	<h5 class="card-title">Cadastrar Piloto</h5>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3 text-center">
				<a href="listar-piloto.php">
					<div class="card">
					 	<div class="card-img-top"><i class="fas fa-list-ul display-2 pt-5 pb-3"></i></div>
					 	<div class="card-body">
					    	<h5 class="card-title">Listar Piloto</h5>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3 text-center">
				<a href="cadastrar-usuario.php">
					<div class="card">
					 	<div class="card-img-top"><i class="fas fa-user-plus display-2 pt-5 pb-3"></i></div>
					 	<div class="card-body">
					    	<h5 class="card-title">Cadastrar Usuário</h5>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3 text-center">
				<a href="listar-usuario.php">
					<div class="card">
					 	<div class="card-img-top"><i class="fas fa-users display-2 pt-5 pb-3"></i></div>
					 	<div class="card-body">
					    	<h5 class="card-title">Listar Usuário</h5>
						</div>
					</div>
				</a>
			</div>

			
			
		</div>
	</div>
<?php include 'footer.php'; ?>