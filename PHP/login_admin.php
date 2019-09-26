<!DOCTYPE html>

<HTML>
	<head>  

		<title> Centro de Escritura</title>
		<meta charset="UTF-8">

		<script> document.createElement("Banner") </script>
		<style>
			Banner{
				display: block;
				background-color: #EEFBFF;
				padding: 30px;
				font-size: 25px;
				text-align: center;
			}
			
		</style>
		<link rel="stylesheet" type="text/css" href="../CSS/menu.css">
		<link rel="stylesheet" type="text/css" href="../CSS/log_admin.css">
		
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>		
		<script src="../JS/login.js"></script>
		<link rel="icon" type="text/css" href="../IMG/pen.png">


	</head>

	<body style="font-family: Roboto Condensed;">

		<Banner>Centro de Escritura</Banner>
		<div id="menu-top" align="left">
			
				<a href="../index.html"><img src="../IMG/back.png"></a>
		</div>

		<div class="simple-login-container">
			<h2>BIENVENIDO</h2>
			<form id="forma_login" method="POST" action="control.php">
				<div class="row">
					<div class="col-md-12 form-group">
						
						<?php
							if($_GET){
								if($_GET['errorusuario'] == 1){
									echo"<font color ='red'><b>Datos incorrectos</b></font>";
								}
							}
						?>	
						

					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						
						<input type="text" class="form-control" id = "nombre_usuario" placeholder="Usuario"  name="user">
						

					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<input type="password" class="form-control" id="password" placeholder="Contraseña"  name="password">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<button class = "btn-login" onclick="login_admin()" >Acceder</button>
					</div>
				</div>
			</form>
		</div>

	</body>

</HTML>