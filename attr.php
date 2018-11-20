<?php
	include "includes/header.php";
?>
<link rel="stylesheet" href="css/thgdo.css">
	<main>
		<h2>Attractions</h2>
		<?php
			include "includes/conexao.php";
			$sql = "select * from Atracao;";
			$resultado = mysqli_query($conexao, $sql);
			if(mysqli_num_rows($resultado) == 0){
				?>
				<div class="attrGeral">
					<div class="attract">
						<div class="attrimg">
							<img src="img/notav.jpg">
						</div>
					</div>
					<div class="infoAttr">
						<h4>Sorry, we are working as fast as possible to bring the attractions to you.</h4>
					</div>
				</div>
			<?php
			}
			else{
				while($attr = mysqli_fetch_array($resultado)){	
			?>
				<div class="attrGeral">
					<div class="attract">
						<div class="attrimg">
							<img src="img/Atracoes/<?=$attr['img'];?>">
						</div>
					</div>
					<div class="infoAttr">
						<h4>Name: <?=$attr['Nome']?></h4>
						<h4>Type: <?=$attr['Tipo']?></h4>
						<h4>Minimum Height: <?=($attr['Altura']) ? $attr['Altura'] ." m" : " - - "?></h4>
						<h4>Capacity: <?=$attr['Capacidade']?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Price: <?=(!$attr['Preco']) ? "FREE" : $attr['Preco'] ."$"?></h4>
						<h4>Descryption: <?=$attr['Descricao']?></h4>
					</div>
				</div>
			<?php
				}
			}	
		?>
	</main>
<?php
	include "includes/footer.php";
?>