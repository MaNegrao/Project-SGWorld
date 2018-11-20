<?php
	include "../includes/headerAdm.php";
?>
	<main>
		<h2>Attraction Report</h2>
		<div class="container">
			<h4><a class="link" href="cad_attr.php">Insert New Attraction Here</a></h4>
			<table id="attr">
				<tr>
					<th>Name<a href="?cmp=Nome&order=asc">&and;</a><a href="?cmp=Nome&order=desc">&or;</a></th>
					<th>Type<a href="?cmp=Tipo&order=asc">&and;</a><a href="?cmp=Tipo&order=desc">&or;</a></th>
					<th>Descryption</th>
					<th>Capacity<a href="?cmp=Capacidade&order=asc">&and;</a><a href="?cmp=Capacidade&order=desc">&or;</a></th>
					<th>Action</th>
				</tr>
				<?php
					include "../includes/conexao.php";
					$sql = "select * from Atracao ";
					if(isset($_GET['cmp']) & isset($_GET['order']))
						$sql .= " order by {$_GET['cmp']} {$_GET['order']}";
					else
						$sql .= " order by Nome asc";
					$resultado = mysqli_query($conexao, $sql);
					if(mysqli_num_rows($resultado) == 0){
						?>
						<tr>
							<td colspan="5">No Attraction Found</td>
						</tr>
						<?php
					}
					else{
						while($attr = mysqli_fetch_array($resultado)){
							?>
							<tr>
								<td id="nomeAttr"><?=$attr['Nome']?></td>
								<td id="tipoAttr"><?=$attr['Tipo']?></td>
								<td id="dscAttr"><?=$attr['Descricao']?></td>
								<td id="capacAttr"><?=$attr['Capacidade']?> Visitors</td>
								<td id="actionAttr"> <a href="upAttr.php?noId=<?=$attr['noId']?>">Update </a> | <a href="delAttr.php?noId=<?=$attr['noId']?>" onclick="return confirmDelete()"> Delete</a></td>
							</tr>
						<?php		
						}
					}				
				?>
			</table>
		</div>
	</main>
<?php
	include "../includes/footerAdm.php";
?>