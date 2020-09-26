<?php 
	$username = $_SERVER['PHP_AUTH_USER'];
?>

<!doctype html>
<html lang="pt-br">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

		<title>Trocar senha SVN</title>
	</head>
	<body>
		<div class="container">
			<div class="col jumbotron" style="margin-top: 20px">
			  <h1 class="display-4">TROCAR SENHA SVN</h1>
			  <p class="lead">Entre com a nova senha e a confirmação para realizar a troca da sua senha Subversion.</p>
			</div>
			<div class="row">
				<div class="col-md-1 col-lg-3 col-xl-4"></div>
				<div class="col-md-10 col-lg-6 col-xl-4">
					<form action="./post-trocar-senha.php" method="post">
					  <div class="form-group">
						<label>Nome de usuário</label>
						<input type="text" class="form-control" value="<?=$username?>" disabled>
						<input type="hidden" name="login" value="<?=$username?>">
					  </div>
					  <div class="form-group">
						<label for="senha1">Nova senha</label>
						<input type="password" class="form-control" id="senha1" name="senha1" placeholder="Nova senha">
						<small id="senha1Help" class="form-text text-danger">Entre com uma senha de força "média" pelo menos.</small>
					  </div>
					  <div class="form-group">
						<label for="senha2">Confirmação</label>
						<input type="password" class="form-control" id="senha2" name="senha2" placeholder="Confirmação">
						<small id="senha2Help" class="form-text text-danger">A confirmação está diferente!</small>
					  </div>
					  <button id="btnSalvar" type="submit" class="btn btn-primary">Salvar</button>
					</form>
				</div>
				<div class="col-md-1 col-lg-3 col-xl-4"></div>
			</div>
		</div>
		<script src="./js/jquery-3.5.1.min.js"></script>
		<script src="./js/knockout-3.5.1.js"></script>
		<script src="./js/pwstrength-bootstrap.min.js"></script>
		<script src="./js/validacao.js"></script>
	</body>
</html>