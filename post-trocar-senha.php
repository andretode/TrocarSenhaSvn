<?php
	$login = $_POST["login"];
	$novaSenha = $_POST["senha1"];
	$confirmacao = $_POST["senha2"];
	$alerta = "alert-danger";
	$msg = "Oops! Algo deu errado, mas nada foi feito. Favor avisar ao administrador do sistema!";
	$isSenhaValida = true;

	if($novaSenha != $confirmacao){
		$msg =  "Nova senha e confirmação diferentes!";
		$alerta = "alert-warning";
		$isSenhaValida = false;
	}

	if(strlen($novaSenha) < 6){
		$msg =  "A senha precisa ter no mínimo 6 caracteres!";
		$alerta = "alert-warning";
		$isSenhaValida = false;
	}

	if($isSenhaValida){
		$commando = "htpasswd -sb /etc/svn/httppwd $login $novaSenha";
		$output = shell_exec($commando);
		$alerta = "alert-success";
		$msg = "Senha alterada com sucesso!";
	}
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
				<div class="col-12">
					<div class="alert <?=$alerta?>" role="alert"><?=$msg?></div>
				</div>
				<div class="col-12">
					<a class="btn btn-primary" href="./index.php">Voltar</a>
				</div>
			</div>
		</div>
	</body>
</html>