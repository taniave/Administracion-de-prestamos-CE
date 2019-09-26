<?php  include("seguridad.php"); ?>
<html>
	<head>
	<script> document.createElement("Banner") </script>
		<script> document.createElement("Banner2") </script>
		<link rel="stylesheet" type="text/css" href="../CSS/menu.css">
		<link rel="stylesheet" type="text/css" href="../CSS/formulario.css">
		<link rel="icon" type="text/css" href="../IMG/pen.png">
		<!--link rel="stylesheet" type="text/css" href="CSS/busqueda.css"-->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		
		<link rel="icon" type="text/css" href="../IMG/pen.png">
		<style>
			
			Banner{
				display: block;
				background-color: #EEFBFF;
				padding: 30px;
				font-size: 25px;
				text-align: center;
			}
			
			Banner2{
				display: block;
				background-color: #EEFBFF;
				padding: 5px;
				font-size: 15px;
				text-align: right;
			}	
		
		</style>

		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
		<script src="../JS/login.js"></script>
	</head>

	<body>
	<div id="menu-top">
			
            <div id="menu-top">
                
                <ul id="lista"> <!--  -->
                    <button id="boton_menu" onclick="location.href ='home_admin.php'">Inicio</button>
                    <button id="boton_menu" onclick="location.href ='agregar_libro.php'">Agregar libro</button>
                    <button id="boton_menu" onclick="location.href ='editar.php'">Editar libro</button>
                    <button id="boton_menu" onclick="location.href ='biblioteca_admin.php'">Biblioteca</button>
                    <button id="boton_menu" onclick="location.href ='agregar_prestamo.php'">Agregar prestamo</button>
                    <button id="boton_menu" onclick="location.href ='devolucion.php'">Prestamos</button>
                    <a href="salir.php"><img src="../IMG/logout2.png" ></a>
                </ul>

            </div>
			<form method="POST" action="busqueda_biblioteca.php" name="search">
					
				<select name="buscar" id="buscar">
					<option selected name="select" value="titulo">Titulo</option>
					<option name="select" value="autor">Autor</option>
					<option name="select" value="isbn">ISBN</option>	
				</select>
				<input type="text" name="query" id="query" placeholder="Buscar" required>
				<button onclick="buscar_libro()" style="color: white;">Buscar</button>
				<!--input type="submit" name="ir"value="Buscar"-->
			</form>
		</div>
	</body>
</html>