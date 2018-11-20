<?php
	include "includes/conexao.php";
	$erros = array();
	if(isset($_POST['send'])){
		$fname = trim(addslashes($_POST['fname']));
		$lname = trim(addslashes($_POST['lname']));
		$nome = $fname . " " . $lname;
		$emp = trim(addslashes($_POST['emp']));
		$desc = trim(addslashes($_POST['desc']));
		$nomee = trim(addslashes($_POST['nomee']));
		$typee = trim(addslashes($_POST['typee']));
		$qtdp = $_POST['qtdp'];
		$imagem = (empty($_FILES['imag']['name'])) ? 'NULL' : "'{$_FILES['imag']['name']}'"; 
		$email = trim(addslashes($_POST['email']));
		$cemail = trim(addslashes($_POST['cemail']));
		$fone = $_POST['phone'];
		$terms = isset($_POST['terms']) ? $_POST['terms'] : 0;

		if(empty($fname) || empty($lname))
			$erros[] = "Enter your complete name.";

		if(empty($fone))
			$erros[] = "Enter your phone.";

		if(empty($email) || !(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)))
           $erros[] = "Enter a valid E-mail";

        if(empty($cemail) || !(filter_var($_POST["cemail"], FILTER_VALIDATE_EMAIL)))
           $erros[] = "Confirm a valid E-mail";

        if($email != $cemail)
        	$erros[] = "Emails do not match.";

		if($imagem <> 'NULL'){
			$destino = "img/Projeto_Eventos/".$_FILES['imag']['name'];
			if(!move_uploaded_file($_FILES['imag']['tmp_name'], $destino)){
				$erros[] = "Error on Image Upload.";
			}
		}else{
			$erros[] = "Send a Image.";
		}

		if(empty($emp))
			$erros[] = "Enter a Company.";

		if(empty($nomee))
			$erros[] = "Enter a Event Name.";

		if(empty($typee))
			$erros[] = "Enter a Event Type.";

		if(!$qtdp){
			$erros[] = "Enter a Amount of People.";
		}

		if(!$terms)
			$erros[] = "You must agree to the Terms and Conditions to continue.";

		if(count($erros) == 0){
			$sql = "INSERT INTO Promotor (Email, Nome, Empresa, Tel) values ('$email', '$nome', '$emp',$fone)";
			$resultado = mysqli_query($conexao, $sql);

			$sql = "INSERT INTO Projeto (EmailProm, Nome, Tipo, Descricao, qtdPessoas, img) values ('$email', '$nomee', '$typee', '$desc', $qtdp, $imagem)";
			$resultado = mysqli_query($conexao, $sql);

			if($resultado){
				$mensagem = "The Project Event, <strong>$nomee</strong> was successfully registered";
			}
			else{
				$mensagem = "Error. Could not register.";
				$mensagem .= mysqli_error($conexao); // para debug
			}
		}
	}
	include 'includes/header.php';
?>
<link rel="stylesheet" type="text/css" href="css/signup.css">
	<main>
		<h2>Send Your Propose of Event!</h2>
		<?php
			if (isset($mensagem)){
					echo "<h4>$mensagem</h4>";
				}
				else{ // carrega form
					if(isset($erros)){
						echo "<ul>";
						foreach ($erros as $erro){
							echo "<h5><li style='color: red;'>$erro</li></h5>";
						}
						echo "</ul>";
					}
		?>
		<form method="post" id="pEvent" enctype="multipart/form-data">
			<h4>Promoter Informations:</h4>
			<div class="equals">
				<div class="form-item">
					<label for="fname" class="label"> First Name:</label>
					<input type="text" name="fname" id="fname" size="20" placeholder="" value="<?=isset($_POST['fname']) ? $_POST['fname'] : '';?>" autofocus>
					<span class="msg-erro" id="msg-fname"></span>
				</div>
				<div class="form-item">
					<label for="lname" class="label"> Last Name:</label>
					<input type="text" name="lname" id="lname" size="20" placeholder="" value="<?=isset($_POST['lname']) ? $_POST['lname'] : '';?>">
					<span class="msg-erro" id="msg-lname"></span>
				</div>
			</div>
			<div class="equals">
				<div class="form-item">
					<label for="emp" class="label"> Empresa:</label>
					<input type="text" name="emp" id="emp" size="20" placeholder="" value="<?=isset($_POST['emp']) ? $_POST['emp'] : '';?>" autofocus>
					<span class="msg-erro" id="msg-emp"></span>
				</div>
				<div class="form-item">
					<label for="phone" class="label">Phone:</label>
					<input type="number" name="phone" id="phone" size="14" placeholder="+00 00000000" value="<?=isset($_POST['phone']) ? $_POST['phone'] : '';?>">
					<span class="msg-erro" id="msg-phone"></span>
				</div>
			</div>
			<div class="equals">
				<div class="form-item">
					<label for="email" class="label">E-mail:</label>
					<input type="email" name="email" id="email" size="20" placeholder="any@email.com" value="<?=isset($_POST['email']) ? $_POST['email'] : '';?>">
					<span class="msg-erro" id="msg-email"></span>
					<span id="resposta"></span>
				</div>
				<div class="form-item">
					<label for="cemail" class="label">Confirm E-mail:</label>
					<input type="email" name="cemail" id="cemail" size="20" placeholder="any@email.com" value="<?=isset($_POST['cemail']) ? $_POST['cemail'] : '';?>">
					<span class="msg-erro" id="msg-cemail"></span>
				</div>
			</div>
			<h4>Event Informations:</h4>
			<div class="equals">
				<div class="form-item">
					<label for="nomee" class="label">Event Name:</label>
					<input type="text" name="nomee" id="nomee" size="20" value="<?=isset($_POST['nomee']) ? $_POST['nomee'] : '';?>">
					<span class="msg-erro" id="msg-nomee"></span>
				</div>
				<div class="form-item">
					<label for="typee" class="label">Event Type:</label>
					<input type="text" name="typee" id="typee" size="20" placeholder="Exposition/Games/ETC" value="<?=isset($_POST['typee']) ? $_POST['typee'] : '';?>">
					<span class="msg-erro" id="msg-typee"></span>
				</div>
			</div>
			<div class="equals">
				<div class="form-item">
					<label for="desc" class="label">Description:</label>
					<textarea style="resize: none" name="desc" rows="5" id="desc" cols="58" ></textarea>
					<span class="msg-erro" id="msg-desc"></span>
				</div>
				<div class="form-item">
					<label for="qtdp" class="label">Amount of Visitors:</label>
					<input type="number" name="qtdp" id="qtdp" size="20" value="<?=isset($_POST['qtdp']) ? $_POST['qtdp'] : '';?>">
					<span class="msg-erro" id="msg-qtdp"></span>
				</div>
			</div>
			<div class="equals">
				<div class="form-item">
					<label class="label">Send a Image of Event:</label>
					<label for="imag" class="custom-file-upload">Upload</label>
					<input type="file" name="imag" id="imag">
					<span class="msg-erro" id="msg-imag"></span>
				</div>
				<div class="form-item" id="cterms">
				    <label><input type="checkbox" id="terms" name="terms"> I agree to the Terms and Conditions</label>
				    <span class="msg-erro" id="msg-terms"></span>
				</div>
			</div>
			<div class="botoes">
				<input type="submit" id="botaoconfirm" name="send" value="Send">
			</div>
		</form>
		<script src="js/eventPromo.js"></script>
	</main>
	<?php
		}
	?>
<?php
	include 'includes/footer.php';
?>