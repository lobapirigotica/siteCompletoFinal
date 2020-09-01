<!DOCTYPE html>

<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo HOME_URI?>view/tema/css/style.css"> 
	

	<title>Criação de Sites</title>
</head>
<body>
	<header>
		<div class = "row" >
			<div class="col-md-4" id="h-logo"><img src="<?php echo HOME_URI  ?>view/tema/imagens/logo.png" style="height:75px"/></div>
			<div class="col-md-4">
				<p class="h3 text-right"><?php echo (isset($_SESSION['nome']) ? $_SESSION['nome'] : '');?></p>
			</div>
			<div class="col-md-1">
				<a class="btn btn-primary btn-sm" href="<?php echo (isset($_SESSION['nome']) ? HOME_URI.'usuario/logout' : HOME_URI.'usuario/login');?>"><?php echo (isset($_SESSION['nome']) ? 'logout' : 'login');?></a>
			</div>
		</div>

		<div id='h-center'>
			<div id="icon-menu">
				<a id="link-icon-menu" href="#"><img src="<?php echo HOME_URI  ?>view/tema/imagens/icon-menu.png" style="height:75px"/></a>
			</div>
			<div id="icon-close-menu">
				<a id="link-icon-close-menu" href="#"><img src="<?php echo HOME_URI  ?>view/tema/imagens/icon-close.png" /></a>
			</div>
		</div>
		<div id='h-user'>
			
			<?php 
			if(isset($_SESSION['user'])){

				echo "<a href='#' id='user-show'><i class='fas fa-user-check' style='font-size:24px'></i></a>";
				echo "<div id='user-info' class='hide' >
						<ul>
						<li>"
					.$_SESSION['user']['name'].
						"</li>
						<li>
					<a href='".HOME_URI."/user/logout'><i class=' fas fa-sign-out-alt' style='font-size:24px'></i></a>
					</li>
				</div>";
				}else{
				echo "<a href='".HOME_URI."/user/login'><i class=' fas fa-sign-in-alt' style='font-size:24px'></i></a>";
			}

			
			?>
		</div>
	</header>
	