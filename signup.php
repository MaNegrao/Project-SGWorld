<?php
	include "includes/conexao.php";
	$erros = array();

	if(isset($_POST['confirm'])){
		$fname = trim(addslashes($_POST['fname']));
		$lname = trim(addslashes($_POST['lname']));
		$nome = $fname . " " . $lname;
		$nacio = $_POST['nacio'];
		$cpf = isset($_POST['cpf']) ? trim($_POST['cpf']) : "";
		$passp = isset($_POST['passp']) ? trim($_POST['passp']) : "";
		$nac = isset($_POST['nac']) ? trim($_POST['nac']) : '';
		$dtna = isset($_POST['nasc']) ? $_POST['nasc'] : '';
		$zip = $_POST['cep'];
		$cidade = trim(addslashes($_POST['cidade']));
		$log = trim(addslashes($_POST['rua']));
		$compl = isset($_POST['compl']) ? trim(addslashes($_POST['compl'])) : '';
		$numb = $_POST['numb'];
		$fone = $_POST['phone'];
		$efone = $_POST['ephone'];
		$afone = isset($_POST['aphone']) ? $_POST['aphone'] : null;
		$email = trim(addslashes($_POST['email']));
		$cemail = trim(addslashes($_POST['cemail']));
		$senha = trim(addslashes($_POST['senha']));
		$csenha = trim(addslashes($_POST['csenha']));
		$terms = isset($_POST['terms']) ? $_POST['terms'] : 0;

		if(empty($fname) || empty($lname))
			$erros[] = "Enter your complete name.";

		if(empty($nac)){
			$erros[] = "Enter yout Nationality.";
		}

		if($nac == "na"){
			if(empty($cpf))
				$erros[] = "Enter your CPF number.";
		}
		elseif($nac == "es"){
			if(empty($passp))
				$erros[] = "Enter your Passaport.";
			if($nacio == 0)
				$erros[] = "Select your place of birth.";
		}

		if(empty($dtna))
			$erros[] = "Enter a emergency phone.";

		if(empty($cidade))
			$erros[] = "Enter a city.";

		if(empty($numb))
			$erros[] = "Enter a Number.";

		if(empty($log))
			$erros[] = "Enter your adress.";

		if(empty($zip))
			$erros[] = "Enter a ZIP Code.";

		if(empty($fone))
			$erros[] = "Enter your phone.";

		if(empty($efone))
			$erros[] = "Enter a emergency phone.";

		if(empty($email) || !(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)))
           $erros[] = "Enter a valid E-mail";

        if(empty($cemail) || !(filter_var($_POST["cemail"], FILTER_VALIDATE_EMAIL)))
           $erros[] = "Confirm a valid E-mail";
        
        if($email != $cemail)
        	$erros[] = "Emails do not match.";

       	if(strlen($senha) < 8)
			$erros[] = "Enter a combination of at least 8 letters and numbers, and/or special characters.";
		else{
			if($senha != $csenha)
				$erros[] = "Passwords do not match.";
		}

		if(!$terms)
			$erros[] = "You must agree to the Terms and Conditions to continue.";

		if(count($erros) == 0){
	
			$sql = "INSERT INTO Endereco (Log, Num, zip, Cidade, Compl) VALUES ('$log', $numb, $zip, '$cidade', '$compl');";
			$resultado = mysqli_query($conexao, $sql);

			$sql = "SELECT MAX(id) from Endereco;";
			$resultado = mysqli_query($conexao, $sql);
			$registro = mysqli_fetch_array($resultado);
			$idEnd = $registro['MAX(id)'];

			$senha = md5($senha);
			$sql = "INSERT INTO Usuario (Email, Nome, Senha, dtNasc, Tel, TelEm, Tel2, idEnd) VALUES ('$email', '$nome', '$senha', '$dtna', '$fone', '$efone', '$afone', $idEnd);";
			$resultado = mysqli_query($conexao, $sql);

			if($nac == "na"){
				$sql = "INSERT INTO Nativo (EmailUser, CPF) VALUES ('$email', $cpf)";
				$resultado = mysqli_query($conexao, $sql);
			}
			elseif($nac == "es"){
				$sql = "INSERT INTO Estrangeiro (EmailUser, Passp, Nacio) VALUES ('$email', '$passp', $nacio);";
				$resultado = mysqli_query($conexao, $sql);
			}

			if($resultado){
				$mensagem = "The User, <strong>$nome</strong> was successfully registered";
			}
			else{
				$mensagem = "Error. Could not register.";
				$mensagem .= mysqli_error($conexao); // para debug
			}	
		}
	}
	include "includes/header.php";
	
?>

<link rel="stylesheet" href="css/signup.css">
		<main class="cadastro">
			<h2>Register now to initiate your adventure</h2>
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
			<form id="form-cadastro" method="post" enctype="multipart/form-data">
				<h4>Personal Informations:</h4>				
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
					<div class="form-item" id="nation">
						<label class="label">Nationality:</label>
						<?php
							if (isset($_POST['nac'])){
								$nac = $_POST['nac']; 
							}
							else{
								$nac = " ";
							}
						?>
					    <label><input type="radio" name="nac" value="es" id="nacE" <?=($nac == 'es') ? "checked" : '';?>>Foreign</label>
					    <label><input type="radio" name="nac" value="na" id="nacN" <?=($nac == 'na') ? "checked" : '';?>>Native</label>
					    <span class="msg-erro" id="msg-nation"></span>
					</div>
					<div class="form-item">
						<label for="nasc" class="label">Date of Birth:</label>
						<input type="date" name="nasc" id="nasc" value="<?=isset($_POST['nasc']) ? $_POST['nasc'] : '';?>">
						<span class="msg-erro" id="msg-date"></span>
					</div>
				</div>
				<div class="equals">
					<div class="form-item" id="docs">
						<label for="cpf" id="label-doc" class="label"></label>
						<input type="text" name="cpf" id="cpf" placeholder="00000000000" disabled value="<?=isset($_POST['cpf']) ? $_POST['cpf'] : '';?>">
						<input type="text" name="passp" id="passp" size="20" placeholder="Passaport" disabled value="<?=isset($_POST['passp']) ? $_POST['passp'] : '';?>">
						<span class="msg-erro" id="msg-doc"></span>
					</div>
					<div class="form-item">
						<label for="naci" class="label">Select your Nationality:</label>
						<select name='nacio' id="naci">
							<option value='0' selected></option>
							<?php
								$sql = "SELECT * from Paises order by name";
								$resultado = mysqli_query($conexao, $sql);
								while($pais = mysqli_fetch_array($resultado)){
									echo "<option value='{$pais['id']}'";
									if(isset($_POST['nacio'])){
										if($_POST['nacio'] == $pais['id'])
											echo " selected";
									}
									echo "> {$pais['name']}</option>";
								}
							?>
						</select>
						<span class="msg-erro" id="msg-nacio"></span>
					</div>
				</div>
				<h4>Address:</h4>
				<div class="equals">
					<div class="form-item">
						<label for="cep" class="label">ZIP Code:</label>
						<input type="number" name="cep" id="cep" size="20" placeholder="000000000" value="<?=isset($_POST['cep']) ? $_POST['cep'] : '';?>">
						<span class="msg-erro" id="msg-cep"></span>
					</div>
					<div class="form-item">
						<label for="cidade" class="label">City:</label>
						<input type="text" name="cidade" id="cidade" size="20" placeholder="City Name" value="<?=isset($_POST['cidade']) ? $_POST['cidade'] : '';?>">
						<span class="msg-erro" id="msg-cidade"></span>
					</div>
				</div>
				<div class="equals">
					<div class="form-item">
						<label for="rua" class="label">Address:</label>
						<input type="text" name="rua" id="rua" size="20" placeholder="Street, Number" value="<?=isset($_POST['rua']) ? $_POST['rua'] : '';?>">
						<span class="msg-erro" id="msg-rua"></span>
					</div>
					<div class="form-item">
						<label for="numb" class="label">Number:</label>
						<input type="number" name="numb" id="numb" size="20" value="<?=isset($_POST['numb']) ? $_POST['numb'] : '';?>">
						<span class="msg-erro" id="msg-numb"></span>
					</div>
				</div>
				<div class="equals">
					<div class="form-item">
						<label for="compl" class="label">Address Line 2:</label>
						<input type="text" name="compl" id="compl" size="20" placeholder="Neighborhood, Apartament" value="<?=isset($_POST['compl']) ? $_POST['compl'] : '';?>">
					</div>
					<div class="form-item">
						<label for="phone" class="label">Phone:</label>
						<input type="number" name="phone" id="phone" size="14" placeholder="+00 00000000" value="<?=isset($_POST['phone']) ? $_POST['phone'] : '';?>">
						<span class="msg-erro" id="msg-phone"></span>
					</div>	
				</div>	
				<div class="equals">
					<div class="form-item">
						<label for="ephone" class="label">Emergency Phone:</label>
						<input type="number" name="ephone" id="ephone" size="14" placeholder="+00 00000000" value="<?=isset($_POST['ephone']) ? $_POST['ephone'] : '';?>">
						<span class="msg-erro" id="msg-ephone"></span>
					</div>
					<div class="form-item">
						<label for="aphone" class="label">Aditional Phone:</label>
						<input type="number" name="aphone" id="aphone" size="14" placeholder="+00 00000000" value="<?=isset($_POST['aphone']) ? $_POST['aphone'] : '';?>">
					</div>
				</div>
				<h4>Login Information:</h4>
				<div class="equals">
					<div class="form-item">
						<label for="email" class="label">E-mail:</label>
						<input type="email" name="email" id="email" size="20" placeholder="any@email.com" value="<?=isset($_POST['email']) ? $_POST['email'] : '';?>">
						<span class="msg-erro" id="msg-email"></span>
					</div>
					<div class="form-item">
						<label for="cemail" class="label">Confirm E-mail:</label>
						<input type="email" name="cemail" id="cemail" size="20" placeholder="any@email.com" value="<?=isset($_POST['cemail']) ? $_POST['cemail'] : '';?>">
						<span class="msg-erro" id="msg-cemail"></span>
					</div>
				</div>
				<div class="equals">
					<div class="form-item">
						<label for="senha" class="label">Password:</label>
						<input type="Password" name="senha" id="senha" size="17" placeholder=" " value="<?=isset($_POST['senha']) ? $_POST['senha'] : '';?>">
						<span class="msg-erro" id="msg-senha"></span>
					</div>
					<div class="form-item">
						<label for="csenha" class="label">Confirm Password:</label>
						<input type="Password" name="csenha" id="csenha" size="17" placeholder=" " value="<?=isset($_POST['csenha']) ? $_POST['csenha'] : '';?>">
						<span class="msg-erro" id="msg-csenha"></span>
					</div>
				</div>
				<div class="form-item">
				    <label><input type="checkbox" name="terms" id="terms"> I agree to the Terms and Conditions</label>
				    <span class="msg-erro" id="msg-terms"></span>
				</div>
				<div class="botoes">
					<input type="submit" id="botaoconfirm" name="confirm" value="Confirm">
					<input type="reset" id="botaoreset" name="Reset" value="Reset">
				</div>
			</form>
			<script src="js/cad.js"></script>
		</main>
		<?php
			}
		?>
<?php
	include "includes/footer.php";
?>