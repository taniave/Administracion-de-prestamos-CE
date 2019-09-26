<!DOCTYPE html>
<HTML>
	<head>  

		<title> Prestamo</title>
		<meta charset="UTF-8">


		<script> document.createElement("Banner") </script>
		<link rel="stylesheet" type="text/css" href="../CSS/menu.css">
		<link rel="stylesheet" type="text/css" href="../CSS/formulario.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<link rel="icon" type="text/css" href="../IMG/pen.png">


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

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="../JS/login.js"></script>

		<script>
            $(document).ready(function(){
            $('[data-toggle="popover"]').popover(); 
            });
        </script>

	</head>

	<body style="font-family: Roboto Condensed;">

		<Banner> Registro de prestamo </Banner>

		<?php  include("seguridad.php"); ?>
		<div id="menu-top">
			
			<div id="menu-top">
					<a href="home_admin.php"><img src="../IMG/back.png"></a>
			</div>
			
		</div>
		
		
		<form align="center" method="POST" action="prestamo.php" name="prestamo" >	
			<table align="Center" width="85%" cellpadding="20">
					<tr>
						
						<td align="center"  colspan="7" style="padding-top: 20px; padding-bottom: 20px;" >
								<p style="color:#FF0000";> * Todos los campos son obligatorios</p>	
						</td>
					</tr>
					<tr align="center">
						<td style="padding-top: 15px; padding-bottom: 15px;">
							ID Alumno: <input type="text" placeholder="ID" name="id_alumno" id="id_alumno" required><font style="color:#FF0000">  *  </font><br>
						</td>
						<td style="padding-top: 15px; padding-bottom: 15px;">				
							Nombre del Alumno: <input type="text" placeholder="Nombre" name="name_st" id="name_st" required><font style="color:#FF0000">  *  </font><br>
						</td>
						<td style="padding-top: 15px; padding-bottom: 15px;">				
							Apellido Paterno: <input type="text" placeholder="Apellido paterno" name="ap_pat" id="ap_pat"required><font style="color:#FF0000">  *  </font><br>
						</td>
					</tr>
					
					<tr align="center">
						<td style="padding-top: 15px; padding-bottom: 15px;">
							Correo institucional: <input type="email" placeholder="example@upaep.edu.mx" name="correo" id="correo" required><font style="color:#FF0000">  *  </font><br>
						</td>

						<td style="padding-top: 15px; padding-bottom: 15px;">					
							Titulo del Libro: <input type="text" placeholder="Titulo del libro"  name="title_pres" id="title_pres" required><font style="color:#FF0000">  *  </font><br>
						</td>
						<td style="padding-top: 15px; padding-bottom: 15px;">
							Fecha de prestamo: 
							 <?php 
							 
							 echo "<input type='text' name='fecha' id='fecha' value='".date('Y-m-d')."' required readonly>";
							 ?>
							 <font style="color:#FF0000">  *  </font><br>	
						</td>
					</tr>

					
					<tr cellpadding ="15">
							
							<td colspan="7" style="padding-top: 15px; padding-bottom: 15px;">
								<input type="reset" name="delete"value="Borrar">
								<button onclick="prestamo_libro()" style="color: white;">Guardar</button>
							</td>
							
					</tr>
				
			</table>
		</form>
	</body>

</HTML>