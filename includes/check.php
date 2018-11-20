<?php
	include "../includes/conexao.php";
	$email = $_POST['email'];
	$sql = "SELECT Email, Nome, Senha, idEnd FROM Usuario WHERE Email = '$email';";
	$resultado = mysqli_query($conexao, $sql);
	if(mysqli_num_rows($resultado) == 0){
		header("Location: ../signin.php?erro=1");
	}
	else{
		$user = mysqli_fetch_array($resultado);
		$senha2 = md5($_POST['senha']);
		if($user['Senha'] == $senha2){
			session_start();
			$_SESSION['uemail'] = $email;
			$_SESSION['unome'] = $user['Nome'];
			$_SESSION['uendereco'] = $user['idEnd'];
			header("Location: ../user/userAccount.php");
		}
		else{
			header("Location: ../signin.php?erro=2");
		}
	}
?>