<!DOCTYPE html>
<?php  include("seguridad.php"); ?>
<HTML>
	<head>  

		<title> Sala de Lectura</title>
		<meta charset="UTF-8">

		<script> document.createElement("Banner") </script>
		<link rel="stylesheet" type="text/css" href="../CSS/menu.css">
		<link rel="stylesheet" type="text/css" href="../CSS/formulario.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<link rel="icon" type="text/css" href="../IMG/pen.png">
		<style>
			Banner{
				display: block;
				background-color: #EEFBFF;
				padding: 30px;
				font-size: 25px;
				text-align: center;
				font-family: 'Roboto Condensed', sans-serif;
			}
			
		</style>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		
		<script src="../JS/login.js"></script>
		<style type="text/css">
            input[type=text],input[type=email]{
				width: 70%;
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
			}
			
        </style>

	</head>

	<body style="font-family: Roboto Condensed;">

		<Banner> Editar libro </Banner>

		
			<div id="menu-top">
					<a href="editar.php"><img src="../IMG/back.png"></a>
			</div>
			
			<?php
                include("conex.php");

				$link=conectarse();
				
				//if(isset($_POST['']))

				$tmp = $_GET['isbn'];
				
			?>
			<form align="center" method="GET" action="update.php" name="">
			<?php
                $result=mysqli_query($link,"select libro.isbn, libro.nombre_libro, group_concat(autor.nombre_autor) as nombre_autor, libro.anio,libro.pais_origen,libro.editorial, libro.edicion, libro.imagen 
				from ((libro
				inner join libro_autor on libro.isbn = libro_autor.isbn)
				inner join autor on autor.id_autor = libro_autor.num_autor)
				where libro.isbn = '$tmp'
				group by libro_autor.isbn");

				$row=mysqli_fetch_array($result);
				
				echo"
				<input type='hidden' name='isbn' id='isbn' maxlength='20' value='$row[0]'/>
				<table align='Center' width='75%' cellpadding='5'>

					<tr align='left'>
						<td align='center' rowspan='10' style='padding-top: 15px; padding-bottom: 15px;'>
							<img class='img-thumbnail' src='".$row[7]."' width='248px' height='400px'>
						</td>
					</tr>	
					
					<tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'>Autor/es Registrado: <input type='text' name='autor' value='$row[2]' id='autor'  style='border: 0px; background: transparent;' readonly> <br></td></tr>
					<tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'>Autor/es nuevo: <input type='text' name='autor_temp' value='$row[2]' placeholder='Nombre del Autor' id='autor_temp' > <br></td></tr>
					<tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'>Título del libro: <input type='text' name='title' value='$row[1]' placeholder='Titulo del libro' id='title' ><br></td></tr>
					<tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'>Edicion: <input type='text' name='ed' value='$row[6]' id='ed' placeholder='Edicion' ><br></td></tr>
					<tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'>Editorial: <input type='text' name='edit' value='$row[5]' id='edit' placeholder='Editorial'><br></td></tr>
					<tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'>Año de publicacion: <input type='year' name='year' value='$row[3]' maxlength='4' id='year' placeholder='Año de publicacion'><br></td></tr>
					<tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'>Pais de origen: <input type='text' name='pais' value='$row[4]' id='pais' placeholder='Pais de origen'><br></td></tr>
					<tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'>ISBN Registrado: <input type='text' name='isbn' id='isbn' maxlength='20' value='$row[0]' style='border: 0px; background: transparent;' readonly><br></td></tr>
					<tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'>ISBN nuevo: <input type='text' name='isbn_temp' id='isbn_temp' maxlength='20' placeholder='ISBN' value='$row[0]'><br></td></tr>
				
					<tr>
						
						<td colspan='7' style='padding-top: 10px; padding-bottom: 10px;'>
							<button style='color: white;'>Guardar</button>
						</td>
					</tr>
					
				</table>";

			?>
			</form>
			
	</body>

</HTML>