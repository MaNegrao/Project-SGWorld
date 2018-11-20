<?php
	include "includes/header.php";
?>
<link rel="stylesheet" href="css/signup.css">
	<main class="cadastro">
		<h2>Login - Sign in and enjoy yourself!!!</h2>
		<form method="post" action="includes/check.php">
			<div class="">
				<div class="form-item" id="emaillo">
					<label for="email" class="label">E-mail:</label>
					<input type="email" name="email" size="40" value="<?=(isset($_POST['email']) ? $_POST['email'] : '')?>">
				</div>
				<div class="form-item" >
					<label for="senha" class="label">Password:</label>
					<input type="password" name="senha" size="40">
				</div>
			</div>
			<div class="form-item">
			  <?php
		        if(isset($_GET['erro'])){
		        	if($_GET['erro'] == 1)
		        		echo "<h5>Wrong E-mail</h5>";
		        	elseif($_GET['erro'] == 2)
		        		echo "<h5>Wrong Password</h5>";
		        	elseif($_GET['erro'] == 3)
		        		echo "<h5>Sign in to acess the page</h5>";
		           	else{
		        		echo "<h5>Acess Denid, Try Again.</h5>";
		        	}
		        }
		        ?>
		    </div>	
		    <div class="botoes" id="loginbut">
				<a href="signup.php"><input type="button" name="signun" value="Sign Up"></a>
				<input type="submit" id="botaoconfirm" name="singup" value="Sign In">
			</div>
		</form>
	</main>


<?php
	include "includes/footer.php";
?>