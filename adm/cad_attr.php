<?php
	include '../includes/conexao.php';
	$erros = array();
	if(isset($_POST['regis'])){
		$nameat = trim(addslashes($_POST['nameat']));
		$altu = $_POST['altu'];
		$tp = trim(addslashes($_POST['tp']));
		$capac = $_POST['capac'];
		$desc = trim(addslashes($_POST['desc']));
		$imagem = (empty($_FILES['imag']['name'])) ? 'NULL' : "'{$_FILES['imag']['name']}'";
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

		if($imagem <> 'NULL'){
			$destino = "../img/Atracoes/".$_FILES['imag']['name'];
			if(!move_uploaded_file($_FILES['imag']['tmp_name'], $destino)){
				$erros[] = "Error on Image Upload.";
			}
		}else{
			$erros[] = "Send a Image.";
		}

		if(!$terms)
			$erros[] = "You must agree to the Terms and Conditions to continue.";

		if(count($erros) == 0){
			$sql = "INSERT INTO Atracao (Nome, Altura, Tipo, Descricao, Capacidade, Preco, img) Values ('$nameat', '$altu', '$tp', '$desc', $capac, $price, {$imagem})";
			$resultado = mysqli_query($conexao, $sql);

			if($resultado){
				$mensagem = "The Attraction, $nameat, was sucessfully registered";
			}
			else{
				$mensagem = "Error, Could not register.";
				$mensagem .= mysqli_error($conexao);
			}
		}
 	}
	include '../includes/headerAdm.php';
?>

<link rel="stylesheet" type="text/css" href="../css/signup.css">

	<main>
		<h2>Attractions Registry</h2>
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
		?>
		<form id="form-Attr" method="post" enctype="multipart/form-data">
			<div class="equals">
				<div class="form-item">
					<label class="label" for="nameat">Name:</label>
					<input type="text" name="nameat" id="nameat" value="<?=isset($_POST['nameat']) ? $_POST['nameat'] : '' ?>">
					<span class="msg-erro" id="msg-nameat"></span>
				</div>
				<div class="form-item">
					<label class="label" for="altu">Minimum Height:</label>
					<input type="text" name="altu" id="altu" min="0" value="<?=isset($_POST['altu']) ? $_POST['altu'] : '' ?>">
				</div>
			</div>
			<div class="equals">
				<div class="form-item">
					<label class="label" for="tp">Type:</label>
					<input type="text" name="tp" id="tp" value="<?=isset($_POST['tp']) ? $_POST['tp'] : '' ?>">
					<span class="msg-erro" id="msg-tp"></span>
				</div>
				<div class="form-item">
					<label class="label" for="capac">Capcacity:</label>
					<input type="number" name="capac" id="capac" value="<?=isset($_POST['capac']) ? $_POST['capac'] : '' ?>">
					<span class="msg-erro" id="msg-capac"></span>
				</div>
			</div>
			<div class="equals">
				<div class="form-item">
					<label for="desc" class="label">Description:</label>
					<textarea style="resize: none" name="desc" rows="5" id="desc" cols="58" ></textarea>
					<span class="msg-erro" id="msg-desc"></span>
				</div>
				<div class="form-item">
					<label class="label" for="price">Price:</label>
					<input type="text" name="price" id="price" value="<?=isset($_POST['price']) ? $_POST['price'] : '' ?>">
				</div>
			</div>
			<div class="equals">
				<div class="form-item">
					<label class="label">Image:</label>
					<label for="imag" class="custom-file-upload">Upload</label>
					<input type="file" name="imag" id="imag">
					<span class="msg-erro" id="msg-imag"></span>
				</div>
				<div class="form-item">
					<label><input type="checkbox" name="terms" id="terms"> I agree to the Terms and Conditions</label>
					<span class="msg-erro" id="msg-terms"></span>
				</div>
			</div>
			<div class="botoes">
				<input type="submit" id="botaoconfirm" name="regis" value="Register">
			</div>
		</form>
		<script src="../js/cad_attr.js"></script>
	</main>
	<?php
		}
	?>
<?php
	include '../includes/footerAdm.php';
?>