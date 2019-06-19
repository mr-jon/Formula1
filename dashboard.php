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
		<div class="row mb-5">
			<div class="col-md-12 text-right">
				<div class="btn-group" role="group" aria-label="Usuários">
					<button type="button" class="btn btn-danger"><i class="fas fa-user-plus"></i> Cadastrar Usuário</button>
					<button type="button" class="btn btn-danger"><i class="fas fa-users"></i> Listar Usuários</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 mb-3 text-center">
				<a class="text-danger" href="cadastrar-pontos.php">
					<div class="card">
					 	<div class="card-img-top"><i class="fas fa-sort-numeric-up-alt display-2 pt-5 pb-3"></i></div>
					 	<div class="card-body">
					    	<h5 class="card-title">Cadastrar Pontos</h5>
						</div>
					</div>
				</a>
			</div>

			<div class="col-md-3 mb-3 text-center">
				<a class="text-danger" href="cadastrar-piloto.php">
					<div class="card">
					 	<div class="card-img-top"><i class="fas fa-steering-wheel display-2 pt-5 pb-3"></i></div>
					 	<div class="card-body">
					    	<h5 class="card-title">Cadastrar Piloto</h5>
						</div>
					</div>
				</a>
			</div>
			
			<div class="col-md-3 mb-3 text-center">
				<a class="text-danger" href="listar-usuario.php">
					<div class="card">
					 	<div class="card-img-top"><i class="fas fa-users-medical display-2 pt-5 pb-3"></i></div>
					 	<div class="card-body">
					    	<h5 class="card-title">Cadastrar Equipe</h5>
						</div>
					</div>
				</a>
			</div>
			
			<div class="col-md-3 mb-3 text-center">
				<a class="text-danger" href="listar-usuario.php">
					<div class="card">
					 	<div class="card-img-top"><i class="far fa-trophy-alt display-2 pt-5 pb-3"></i></div>
					 	<div class="card-body">
					    	<h5 class="card-title">Cadastrar GP</h5>
						</div>
					</div>
				</a>
			</div>
			
			<div class="col-md-3 mb-3 text-center">
				<a class="text-danger" href="listar-usuario.php">
					<div class="card">
					 	<div class="card-img-top"><i class="far fa-globe-americas display-2 pt-5 pb-3"></i></div>
					 	<div class="card-body">
					    	<h5 class="card-title">Cadastrar País</h5>
						</div>
					</div>
				</a>
			</div>
			
		</div>
		
	</div>
<?php include 'footer.php'; ?>