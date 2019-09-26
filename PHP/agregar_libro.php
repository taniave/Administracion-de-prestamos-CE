
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
		<script>
            $(document).ready(function(){
            $('[data-toggle="popover"]').popover(); 
            });
        </script>

	</head>

	<body style="font-family: Roboto Condensed;">
		
		<Banner> Agregar a Biblioteca </Banner>
		
		
			<div id="menu-top">
					<a href="home_admin.php"><img src="../IMG/back.png"></a>
			</div>
			<form align="center" method="POST" action="agregar.php" name="add" enctype="multipart/form-data">
				<table align="Center" width="75%" cellpadding="5">
						<tr>
							<td align="center"  colspan="7" style="padding-top: 20px; padding-bottom: 20px;" >
									<p style="color:#FF0000";> * Todos los campos son obligatorios</p>
									
							</td>
						</tr>
					<tr align="left">
						<td align="center" rowspan="7" style="padding-top: 10px; padding-bottom: 10px;">
							<!--img src="IMG/portada.jpg" height="50%" width="45%" title ="libro"-->	
							<!--div align="down"  </div> -->
							<input type="file" name="archivo" id="archivo"  size="25" maxlength="70" required>
						</td>
					</tr>
					
					<tr align="left">
						<td style="padding-top: 10px; padding-bottom: 10px;">
							Autor/es: <input type="text" placeholder="Nombre del Autor" name="autor" data-toggle="popover" data-trigger="focus" data-placement="top" title="Alerta" data-content="Si el libro posee varios autores, separarlos con coma"  required id="autor"><font style="color:#FF0000">  *  </font> <br>
						</td>
						<td>				
							Título del libro: <input type="text" placeholder="Título" name="title" id="title" required><font style="color:#FF0000">  *  </font><br>
						</td>
					</tr>


					<tr align="left">
						<td style="padding-top: 15px; padding-bottom: 15px;">
							Edicion: <input type="text" placeholder="Primera Edicion" name="ed" id="ed" required><font style="color:#FF0000">  *  </font><br>
						</td>

						<td>					
							Editorial: <input type="text" placeholder="Editorial" name="edit" id="edit" required><font style="color:#FF0000">  *  </font><br>
						</td>
					</tr>

					<tr align="left">
						<td style="padding-top: 15px; padding-bottom: 15px;">
							Año de publicacion: <input type="year" placeholder="Año de publicacion" name="year" maxlength="4" id="year" required><font style="color:#FF0000">  *  </font><br>	
						</td>
						<td>					
							Pais de origen: <input type="text" placeholder="Pais" name="pais" id="pais" required><font style="color:#FF0000">  *  </font><br>
						</td>
					</tr>

					<tr align="left">
						<td style="padding-top: 15px; padding-bottom: 15px;">
							ISBN: <input type="text" placeholder="ISBN" name="isbn" id="isbn" maxlength="20" required><font style="color:#FF0000">  *  </font><br>
						</td>
						<td align="left" style="padding-top: 15px; padding-bottom: 15px;">
							<!-- Trigger the modal with a button -->
							<button data-toggle="modal" data-target="#myModal" style="color: white;">Agregar copias</button> <font style="color:#FF0000">  *  </font><br>

							<!-- Modal -->
							<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog modal-sm">

								<!-- Modal content-->
								<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Ingresar numero de copias deseadas</h4>
								</div>
								<div class="modal-body">
										Num. Copias: <input type="text" placeholder="Copias" name="copias" id="copias" required><font style="color:#FF0000">  *  </font><br>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
								</div>
								</div>

							</div>
							</div>
						</td>
						<!--td>

							Disponible: SI <input type="radio" name="disponible" value="Si" checked="">
							NO <input type="radio" name="disponible" value="No"><br>	
						</td-->
					</tr>
					<tr>
						
						<td colspan="7" style="padding-top: 10px; padding-bottom: 10px;">
							<button onclick="agregar()"style="color: white;">Guardar</button>
							<input type="reset" name="delete"value="Borrar"/>
						</td>
					</tr>
					
				</table>
			</form>

			
			
	</body>

</HTML>