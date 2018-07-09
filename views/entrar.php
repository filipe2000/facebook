<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Facebook</title>
	<link href="<?php echo BASE_URL; ?>assets/css/template.css" rel="stylesheet" type="text/css" >
	<link href="<?php echo BASE_URL; ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" >
	<link href="<?php echo BASE_URL; ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" >
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
</head>
<body>
<nav class="navbar">
	<div class="container">
		<div class="navbar">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="<?php echo BASE_URL; ?>">
					<img src="<?php echo BASE_URL; ?>assets/images/logo.png" class="logo_navbar">
				</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right ">
				<li><a href="<?php echo BASE_URL; ?>login/entrar" class="nmuser">Login</a></li>
				<li><a href="<?php echo BASE_URL; ?>login/cadastrar" class="nmuser">Cadastrar</a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="container">
	<div class="container">
	<h1>Login</h1>
	<form method="POST">
	<div class="form-group">
		<label for="email">E-mail:</label>
		<input type="email" name="email" class="form-control" id="email"></input>
	</div>
	<div class="form-group">
		<label for="senha">Senha:</label>
		<input type="password" name="senha" class="form-control" id="senha"></input>
	</div>	
	<button class="btn btn-default" type="submit">Entrar</button>
	</form>
	<?php
	if(!empty($msg)): ?>
	<div class="alert alert-danger"><?php echo $msg; ?></div>
	<?php endif;	?>
</div>
</div>
</body>
</html>