<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="theme-color" content="#5a5858">
		<meta name="apple-mobile-web-app-status-bar-style" content="#ff3000">
		<title>Soft & Gaming World</title>
		<link rel="shortcut icon" href="img/headlogo.png" type="image/x-icon"/>
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Patrick+Hand+SC" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allan" rel="stylesheet">
	</head>
	<body>
		<header>
			<div id="top">
				<input id="home" type="button" value="Home Page" onclick="window.location.href='index.php'">
				<a href="index.php"><img src="img/LOGO2.png" alt="Logo do Parque onde há um jogador e embaixo o nome do Parque"></a>
				<?php
					if(isset($_SESSION['uemail'])){
				?>
				<div id="buton">
					<a href="includes/logoff.php"><input type="button" value="Log Off"></a>
					<a href="user/userAccount.php"><input type="button" value="My Account"></a>
				</div>
				<p class="msgsession">Welcome, <?=$_SESSION['unome'];?>.</p>
				<?php
					}else{
				?>
				<div id="buton">
					<a href="signup.php"><input type="button" value="Sign Up"></a>	
					<a href="signin.php"><input type="button" value="Sign In"></a>
				</div>
				<?php
					}
				?>
				<a id="cart-header" href="#"><img src="img/cart.png" width="60" alt="icone de carrinho"></a>
			</div>
			<div class="bottom">
				<div class="b-menu-cart">
					<button id="exibeMenu" onclick="exibeMenu()">MENU</button>
					<input type="button" value="Cart" onclick="window.location.href='#'">
				</div>
				<nav class="menu-principal">
					<ul>
						<li><a href="abtPark.php">About Park</a></li>
						<li><a href="#">Tickets</a></li>
						<li><a href="thgdo.php">Things to Do</a></li>
						<li><a href="#">Shop</a></li>
						<li><a href="cad_EventPromo.php">Event's Promoter</a></li>
						<li><a href="#">Help</a></li>
						<li><a href="loginAdm.php">Administation</a></li>
					</ul>
				</nav>
			</div>
		</header>