<?php
	session_start();
	if(!isset($_SESSION['adminu']) || $_SESSION['adminu'] != "admin")
		header("Location: ../loginAdm.php?erro=3");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Administration - Soft and Gaming World</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="../img/headlogo.png" type="image/x-icon"/>
		<link rel="stylesheet" href="../css/stylesAdm.css">
		<link rel="stylesheet" href="../css/signup.css">
		<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allan" rel="stylesheet">
	</head>
	<body>	
		<header>
			<div id="top">
				<input id="home" type="button" value="Site - Home Page" onclick="window.location.href='../index.php'">
				<h1>Administration</h1>
			</div>
			<div class="bottom">
				<nav class="menu-principal">
					<ul>
						<li><a href="ListAtt.php">Atracctions</a></li>
						<li><a href="#">Visitors</a></li>
						<li><a href="ListEvents.php">Events</a></li>
						<li><a href="ListProject.php">Events Projects</a></li>
						<li><a href="#">Shop Products</a></li>
						<li><a href="#">Promotions</a></li>
					</ul>
				</nav>
			</div>
		</header>