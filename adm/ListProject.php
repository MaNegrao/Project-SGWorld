<?php
	include "../includes/headerAdm.php";
?>
	<main>
		<h2>Project Report</h2>
		<div class="container">
			<table id="attr">
				<tr>
					<th>Name<a href="?cmp=Nome&order=asc">&and;</a><a href="?cmp=Nome&order=desc">&or;</a></th>
					<th>Type<a href="?cmp=Tipo&order=asc">&and;</a><a href="?cmp=Tipo&order=desc">&or;</a></th>
					<th>Descryption</th>
					<th>Amount of Visitors<a href="?cmp=qtdPessoas&order=asc">&and;</a><a href="?cmp=qtdPessoas&order=desc">&or;</a></th>
					<th>Action</th>
				</tr>
				<?php
					include "../includes/conexao.php";
					$sql = "select * from Projeto ";
					if(isset($_GET['cmp']) & isset($_GET['order']))
						$sql .= " order by {$_GET['cmp']} {$_GET['order']}";
					else
						$sql .= " order by Nome asc";
					$resultado = mysqli_query($conexao, $sql);
					if(mysqli_num_rows($resultado) == 0){
						?>
						<tr>
							<td colspan="5">No Project Found</td>
						</tr>
						<?php
					}
					else{
						while($project = mysqli_fetch_array($resultado)){
							?>
							<tr>
								<td id="nomeAttr"><?=$project['Nome']?></td>
								<td id="tipoAttr"><?=$project['Tipo']?></td>
								<td id="dscProject"><?=$project['Descricao']?></td>
								<td id="qtdProject"><?=$project['qtdPessoas']?> Visitors</td>
								<td id="actionAttr"> <a href="cad_Event.php?id=<?=$project['id']?>"> Aprrove</a> | <a href="delProject.php?id=<?=$project['id']?>" onclick="return confirmDelete()"> Delete </a></td>
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