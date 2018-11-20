<?php
	session_start();
	if(isset($_SESSION['adminu']))
		if($_SESSION['adminu'] == "admin"){
			header("Location: adm/ListAtt.php");
		}
	include "includes/header.php";
?>
<link rel="stylesheet" href="css/signup.css">
	<main class="cadastro">
		<h2>Admin Login - Sign in to administer the site.</h2>
		<form method="post" action="includes/checkAdm.php">
			<div class="">
				<div class="form-item" id="admin">
					<label for="admin" class="label">Admin User:</label>
					<input type="text" name="admin" size="40" value="<?=(isset($_POST['admin']) ? $_POST['admin'] : '')?>">
				</div>
				<div class="form-item" >
					<label for="senhaAdm" class="label">Password:</label>
					<input type="password" name="senhaAdm" size="40">
				</div>
			</div>
			<div class="form-item">
			  <?php
		        if(isset($_GET['erro'])){
		        	if($_GET['erro'] == 1)
		        		echo "<h5>Acess Denid, Wrong User.</h5>";
		        	elseif($_GET['erro'] == 2)
		        		echo "<h5>Acess Denid, Wrong Password.</h5>";
		        	else{
		        		echo "<h5>Acess Denid, Try Again.</h5>";
		        	}
		        }
		        ?>
		    </div>	
		    <div class="botoes" id="loginbut">
				<input type="submit" id="botaoconfirm" name="singup" value="Sign In">
			</div>
		</form>
	</main>

<?php
	include "includes/footer.php";
?>