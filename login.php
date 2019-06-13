<?php include 'header.php'; ?>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-4 offset-4">
				<form class="form-signin" action="validacao.php" method="post">
					<?php
						if(isset($erro) && $erro != "") {
						echo "<div class='alert alert-danger' role='alert'>$erro</div>";
					} ?>
					<h1 class="h3 mb-3 font-weight-normal">Login</h1>
					<div class="form-group">
						<label for="inputEmail" class="sr-only">E-mail:</label>
						<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
						<label for="inputPassword" class="sr-only">Senha:</label>
						<input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="senha">
					</div>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
				</form>
			</div>
		</div>
	</div>
<?php include 'footer.php'; ?>