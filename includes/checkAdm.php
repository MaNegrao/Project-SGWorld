<?php
	$user = "admin";
	$pass = "admin";
	
	if($_POST['admin'] != $user){
		header("Location: ../loginAdm.php?erro=1");
	}
	else{
		if($_POST['senhaAdm'] == $pass){
			session_start();
			$_SESSION['adminu'] = $user;
			$_SESSION['adminp'] = $passp;
			header("Location: ../adm/ListAtt.php");
		}
		else{
			header("Location: ../loginAdm.php?erro=2");
		}
	}
?>