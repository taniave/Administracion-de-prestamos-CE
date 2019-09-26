<?php
	include("conex.php");
	$link=conectarse();

	$user = $_POST["user"];
	$password = $_POST["password"];

	$verificar = mysqli_query($link,"select * from usuario where usuario='$user'");

	if(mysqli_num_rows($verificar)){
		while($row=mysqli_fetch_array($verificar)){
			if($row['pswd'] == $password){
				session_start();
				$_SESSION["autentificado"] = "SI";
				$_SESSION["user"] = $user;
				header("Location: home_admin.php");
			}
			else{
				header("Location: login_admin.php?errorusuario=1");
			}
		}
		
	}
	
?>