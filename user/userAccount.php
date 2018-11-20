<?php
	session_start();
	if(!isset($_SESSION['uemail'])){
		header("Location: ../signin.php?erro=3");
	}
	include "../includes/headerUser.php";
?>
<link rel="stylesheet" type="text/css" href="../css/user.css">
	<main class="pagUser">
		<h2>My Account</h2>
		<div class="content">	
			<section class="menuUser">
				<nav>
					<ul>
						<li><a href="">Inicio</a></li>
						<li><a href="">Compras</a></li>
						<li><a href="">Ingressos</a></li>
						<li><a href="">Meus Dados</a></li>
						<li><a href="">Duvidas</a></li>
					</ul>
				</nav>
			</section>
			<section class="infoUser">
				
			</section>
		</div>
	</main>

<?php
	include "../includes/footerAdm.php";
?>