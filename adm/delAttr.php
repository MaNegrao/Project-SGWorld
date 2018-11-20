<?php
	include "../includes/headerAdm.php";
?>
	<main>
		<h2>Attraction Delete</h2>
	</main>
	<?php
		if(isset($_GET['noId'])){
			if(is_numeric($_GET['noId'])){
				include "../includes/conexao.php";
				$sql = "DELETE from Atracao where noId = {$_GET['noId']}";
				$resultado = mysqli_query($conexao, $sql);
				if($resultado){
					echo "<h4>Attraction was successfully deleted.</h4>";
				}
				else{
					echo "<h4>Attraction cannot be deleted.</h4>";
				}
			}
			else{
				echo "<h4>Attraction code is invalid.</h4>";
			}
		}
		else{
			echo "<h4>This attraction code do not exists.</h4>";
		}
	?>
<?php
	include "../includes/footerAdm.php";
?>