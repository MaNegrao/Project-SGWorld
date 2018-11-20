<?php
	include "includes/header.php";
?>
<link rel="stylesheet" href="css/thgdo.css">
			<nav id="sub-menu" class="container">	
				<ul>
					<li><a href="attr.php">Attractions</a></li>
					<li><a href="#">Events</a></li>
					<li><a href="#">Arenas</a></li>
					<li><a href="#">Maps</a></li>
				</ul>
			</nav>
			<section class="attract">
				<h2>Some Attratcions</h2>
				<?php
					include "includes/conexao.php";
					$sql = "select * from Atracao where noId < 5;";
					$resultado = mysqli_query($conexao, $sql);
					if(mysqli_num_rows($resultado) == 0){
						?>
						<div class="tab">
							<button class="tablinks" id="defaultOpen" onclick="openTab(event, 'none')">Sorry</button>
						</div>
						<div id="none" class="tabcontent">
							<div class="polaroid">
								<img src="img/notav.jpg" style="width:100%">
								<div class="container">
									<p>Sorry, we are working as fast as possible to bring the attractions to you. </p>
								</div>
							</div>
						</div>
						<?php
					}
					else{
						echo "<div class='tab'>";
						while($attr = mysqli_fetch_array($resultado)){
							?>
							<button class="tablinks" onclick="openTab(event, '<?=$attr['noId']?>')" id="defaultOpen"><?=$attr['Nome']?></button>
							<?php
						}
						echo "</div>";
						$sql = "select * from Atracao where noId < 5;";
						$resultado = mysqli_query($conexao, $sql);
						while($attr = mysqli_fetch_array($resultado)){
				?>
				<div id="<?=$attr['noId']?>" class="tabcontent">
					<div class="polaroid">
						<img src="img/Atracoes/<?=$attr['img']?>" alt="<?=$attr['Descricao']?>" style="width:100%">
						<div class="container">
					  		<p><?=$attr['Descricao']?></p>
					  	</div>
					</div>
				</div>
				<?php		
						}
					}				
				?>
			</section>
			<section class="tabela-at">
				<h2 id="tabelas">Some Atractions Informations</h2>
				<table>
					<tr>
						<th>Name: <a href="?cmp=Nome&order=asc">&and;</a><a href="?cmp=Nome&order=desc">&or;</a></th>
						<th>Type: <a href="?cmp=Tipo&order=asc">&and;</a><a href="?cmp=Tipo&order=desc">&or;</a></th>
						<th>Minimum Height: <a href="?cmp=Altura&order=asc">&and;</a><a href="?cmp=Altura&order=desc">&or;</a></th>
					</tr>
					<?php
					$sql = "select * from Atracao ";
					if(isset($_GET['cmp']) & isset($_GET['order']))
						$sql .= " order by {$_GET['cmp']} {$_GET['order']}";
					else
						$sql .= " order by Nome asc";
					$resultado = mysqli_query($conexao, $sql);
					if(mysqli_num_rows($resultado) == 0){
						?>
						<tr>
							<td colspan="3">No Attraction Found</td>
						</tr>
						<?php
					}
					else{
						while($attr = mysqli_fetch_array($resultado)){
							?>
							<tr>
								<td ><?=$attr['Nome']?></td>
								<td ><?=$attr['Tipo']?></td>
								<td id="nivel"><?= ($attr['Altura']) ? $attr['Altura'] ." m" : "- - "?></td>
							</tr>
						<?php		
						}
					}				
				?>
				</table>		
		</section>
<?php
	include "includes/footer.php";
?>