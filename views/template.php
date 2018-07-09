<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Facebook</title>
	<link href="<?php echo BASE_URL; ?>assets/css/template.css" rel="stylesheet" type="text/css" >
	<link href="<?php echo BASE_URL; ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle nmuser" data-toggle="dropdown" href="#">
						<?php echo $viewData['usuario_loged'];
						//echo $viewData['usuario_nome']; ?>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo BASE_URL; ?>perfil/edit">Editar Perfil</a></li>
						<li><a href="<?php echo BASE_URL; ?>login/sair">Sair</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
	</div>
</nav>
<div class="container">
		<?php $this->loadViewInTemplate($viewName, $viewData); ?>
	</div>    
</body>
</html>