<?php
	include "../includes/conexao.php";
	$erros = array();
	if(isset($_POST['update'])){
		$nameat = trim(addslashes($_POST['nameat']));
		$alt = isset($_POST['alt']) ? $_POST['alt'] : 'NULL';
		$tp = trim(addslashes($_POST['tp']));
		$capac = $_POST['capac'];
		$desc = trim(addslashes($_POST['desc']));
		$imagem = (empty($_FILES['imag']['name'])) ? 'img' : "'{$_FILES['imag']['name']}'";
		$price = empty($_POST['price']) ? 'NULL' : $_POST['price'];
		$terms = isset($_POST['terms']) ? $_POST['terms'] : 0;

		if(empty($nameat))
			$erros[] = "Enter a Attraction Name.";
		
		if(empty($tp))
			$erros[] = "Enter a Attraction Type.";

		if(!$capac)
			$erros[] = "Enter a Attraction Capcacity.";

		if(empty($desc))
			$erros[] = "Enter a Attraction Description.";

		if(!empty($_FILES['imag']['name'])){
			$destino = "../img/Atracoes/".$_FILES['imag']['name'];
			if(!move_uploaded_file($_FILES['imag']['tmp_name'], $destino)){
				$erros[] = "Error on Image Upload.";
			}
		}else if(empty($imagem)){
			$erros[] = "Send a Image.";
		}

		if(!$terms)
			$erros[] = "You must agree to the Terms and Conditions to continue.";

		if(count($erros) == 0){
			$sql = "UPDATE Atracao SET Nome = '$nameat', Altura = '$alt', Tipo = '$tp', Descricao = '$desc', Capacidade = $capac, Preco = $price, img = {$imagem} WHERE noId = {$_GET['noId']}";
			$resultado = mysqli_query($conexao, $sql);

			if($resultado){
				$mensagem = "The Attraction, $nameat, was sucessfully updated";
			}
			else{
				$mensagem = "Error, Could not update.";
				$mensagem .= mysqli_error($conexao);
			}
		}
	}
	else{
		$sql = "SELECT * FROM Atracao where noId = {$_GET['noId']}";
		$resultado = mysqli_query($conexao, $sql);
		$dados = mysqli_fetch_array($resultado);
	}
	include "../includes/headerAdm.php";
?>
	<main>
		<h2>Attractions Update</h2>
		<?php
			if (isset($mensagem)){
				echo "<h4>$mensagem</h4>";
			}
			else{ // carrega form
				if(isset($erros)){
					echo "<ul>";
					foreach ($erros as $erro){
						echo "<li style='color: red;'><h5>$erro</h5></li>";
					}
					echo "</ul>";
				}
			$sql = "SELECT * FROM Atracao where noId = {$_GET['noId']}";
			$resultado = mysqli_query($conexao, $sql);
			$dados = mysqli_fetch_array($resultado);
		?>
		<form id="form-Attr" method="post" enctype="multipart/form-data" onsubmit="ValidaCadAttr();">
			<div class="equals">
				<div class="form-item">
					<label class="label" for="nameat">Name:</label>
					<input type="text" name="nameat" id="nameat" value="<?=isset($_POST['nameat']) ? $_POST['nameat'] : $dados['Nome'] ?>">
					<span class="msg-erro" id="msg-nameat"></span>
				</div>
				<div class="form-item">
					<label class="label" for="alt">Minimum Height:</label>
					<input type="text" name="alt" id="alt" min="0" value="<?=isset($_POST['alt']) ? $_POST['alt'] : $dados['Altura'] ?>">
				</div>
			</div>
			<div class="equals">
				<div class="form-item">
					<label class="label" for="tp">Type:</label>
					<input type="text" name="tp" id="tp" value="<?=isset($_POST['tp']) ? $_POST['tp'] : $dados['Tipo'] ?>">
					<span class="msg-erro" id="msg-tp"></span>
				</div>
				<div class="form-item">
					<label class="label" for="capac">Capcacity:</label>
					<input type="number" name="capac" id="capac" value="<?=isset($_POST['capac']) ? $_POST['capac'] : $dados['Capacidade'] ?>">
					<span class="msg-erro" id="msg-capac"></span>
				</div>
			</div>
			<div class="equals">
				<div class="form-item">
					<label for="desc" class="label">Description:</label>
					<textarea style="resize: none" name="desc" rows="5" id="desc" cols="58" ><?=isset($_POST['desc']) ? $_POST['desc'] : $dados['Descricao'];?></textarea>
					<span class="msg-erro" id="msg-desc"></span>
				</div>
				<div class="form-item">
					<label class="label" for="price">Price:</label>
					<input type="text" name="price" id="price" value="<?=isset($_POST['price']) ? $_POST['price'] : $dados['Preco'] ?>">
				</div>
			</div>
			<div class="equals">
				<div class="form-item">
					<label class="label">Image:</label>
					<figure id="imgCad">
						<img src="../img/Atracoes/<?=$dados['img']?>">
					</figure>
					<label for="imag" class="custom-file-upload">Change</label>
					<input type="file" name="imag" id="imag">
					<span class="msg-erro" id="msg-imag"></span>
				</div>
				<div class="form-item" id="termss">
					<label><input type="checkbox" id="terms" name="terms" > I agree to the Terms and Conditions</label>
					<span class="msg-erro" id="msg-terms"></span>
				</div>
			</div>
			<div class="botoes">
				<input type="submit" id="botaoconfirm" name="update" value="Update">
			</div>
		</form>
		<script src="../js/cad_attr.js"></script>
	</main>
	<?php
		}
	?>
<?php
	include "../includes/footerAdm.php";
?>