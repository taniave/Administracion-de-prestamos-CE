<!DOCTYPE html>
<HTML>
	<head>  

		<title>Devolucion</title>
		<meta charset="UTF-8">

		<script> document.createElement("Banner") </script>
		<link rel="stylesheet" type="text/css" href="../CSS/menu.css">
		<link rel="stylesheet" type="text/css" href="../CSS/formulario.css">
		<link rel="icon" type="text/css" href="../IMG/pen.png">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		




		<style>
			Banner{
				display: block;
				background-color:#EEFBFF;
				padding: 30px;
				font-size: 25px;
				text-align: center;
				font-family: 'Roboto Condensed', sans-serif;
			}
			
            
        </style>
        
        <style type="text/css">
            
			.libro{
                border: 0px;
                background: transparent;
                width: 80%;
                -webkit-transition: width 0.10s ease-in-out;
                transition: width 0.10s ease-in-out;
            }
        </style>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="../JS/login.js"></script>

		<!--Hoja de estilos del calendario --> 
		<link rel="stylesheet" type="text/css" media="all" href="../CSS/calendar-blue2.css" title="win2k-cold-1" /> 

		<!-- librería principal del calendario --> 
		<script type="text/javascript" src="../JS/calendar.js"></script> 

		<!-- librería para cargar el lenguaje deseado --> 
		<script type="text/javascript" src="../JS/calendar-es.js"></script> 

		<!-- librería que declara la función Calendar.setup, que ayuda a generar un calendario en unas pocas líneas de código --> 
		<script type="text/javascript" src="../JS/calendar-setup.js"></script> 


	</head>

	<body style="font-family: Roboto Condensed;">

		<Banner> Editar Devolucion </Banner>
		
			
		<div id="menu-top">
				<a href="devolucion.php"><img src="../IMG/back.png"></a>
		</div>
        <?php  include("seguridad.php"); ?>
        <?php
                include("conex.php");

				$link=conectarse();
				
				//if(isset($_POST['']))
                $tmp = $_GET['num_prestamo'];
				
			?>
			<form align="center" method="GET" action="devolucion_actualizar.php" name="">
			<?php

                $result = mysqli_query($link,"select prestamo.num_prestamo, estudiante.id, estudiante.nombre,estudiante.ap_pat,estudiante.correo, prestamo.fecha_prestamo,libro.nombre_libro, group_concat(autor.nombre_autor) as nombre_autor,libro.editorial, libro.edicion,libro.isbn,libro.imagen
                from (((((estudiante
                inner join prestamo on estudiante.id = prestamo.id_alumno)
                inner join prestamo_libro on prestamo.num_prestamo = prestamo_libro.num_prestamo)
                inner join libro on prestamo_libro.isbn = libro.isbn)
                inner join libro_autor on libro.isbn = libro_autor.isbn)
                inner join autor on autor.id_autor = libro_autor.num_autor)
				where prestamo.num_prestamo = '$tmp'
				group by libro_autor.isbn");

				$row=mysqli_fetch_array($result);
				
				
				
                
				
				echo"<div class='container'>";
				echo"<div class='row'>";
					
					echo"<input type='text' name='num_prestamo' id='num_prestamo' value='$row[0]' hidden>";
					echo"<input type='text' name='isbn' id='isbn' value='$row[10]' hidden>";
							echo"<div class='row'>";
								echo"<div class='col-md-6' style='padding-top:15px; padding-bottom:15px;'><img class='img-thumbnail' src='".$row[11]."' width='248px' height='400px'></div>";
								echo"<div class='col-md-6'style='padding-top:15px; padding-bottom:15px; text-align:left;'>";
										echo"<h3>".$row[6]."</h3><br>";
										echo"<b>Autor/es:</b> ".$row[7]."<br>";
										echo"<b>Edicion:</b> ". $row[8]."<br>";
										echo"<b>Editorial:</b> ". $row[9]."<br>";
										echo"<div class='row' 'style=' padding-top:15px; padding-bottom:15px; padding-right:0px; align-content:center;'>";
												
										echo"<h3>Datos del prestamo</h3> <br>";
										echo"<b>ID Alumno:</b><input type='text'  name='id_alumno' id='id_alumno' value='$row[1]'  class='libro' readonly><br>";
										echo"<b>Nombre del Alumno:</b> ".$row[2]."<br>";
										echo"<b>Apellido Paterno:</b> ".$row[3]."<br>";
										echo"<b>Correo institucional:</b> ".$row[4]."<br>";
										echo"<b>Fecha de prestamo:</b> ".date('d/m/Y',strtotime($row[5]))."<br>";
										echo"<input type='date' name='fecha_pres' id='fecha_pres' value='$row[5]' class='libro' hidden>";

										echo"
										
										<font style='color:#FF0000'>*</font><b>Fecha de devolucion:</b> <input type='text' name='fecha_dev' id='fecha_dev' required><input type='button' id='lanzador' value='...' /> <br>
										";
										echo"<div class='row' 'style='width:50%; padding-top:15px; padding-bottom:15px; padding-right:0px; align-content:center;'>";
                                                
										echo"<div class='col-md-6'><button style='color: white;'>Guardar</button></div>";	
												
										echo"</div>"; 		
												
											echo"</div>";   
										echo"</div>"; 

								echo"</div>";
						
						echo"</div>";
					echo"</div>";
			?>
			</form>

			<script type="text/javascript"> 
				Calendar.setup({ 
					inputField     :    "fecha_dev",     // id del campo de texto 
					ifFormat     :     "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto 
					button     :    "lanzador"     // el id del botón que lanzará el calendario 
				}); 
			</script>
	</body>

</HTML>