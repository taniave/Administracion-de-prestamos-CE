<!DOCTYPE html>
<?php  include("seguridad.php"); ?>
<HTML>
	<head>  

		<title> Prestamo</title>
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
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style type="text/css">
            .libro{
                border: 0px;
                background: transparent;
                width: 50%;
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
            }
        </style>

	</head>

	<body style="font-family: Roboto Condensed;">

		<Banner> Consultar prestamos </Banner>
		<div id="menu-top">
				<a href="biblioteca_admin.php"><img src="../IMG/back.png"></a>
        </div>
        
        <?php
                include("conex.php");

				$link=conectarse();
				error_reporting(E_ALL);
				ini_set('display_errors', 1);
				//if(isset($_POST['']))
				$tmp = $_GET['isbn'];
				
				$temp = mysqli_query($link,"select prestamo.num_prestamo, estudiante.id, estudiante.nombre,estudiante.ap_pat,estudiante.correo, prestamo.fecha_prestamo
				from (((estudiante
				inner join prestamo on estudiante.id = prestamo.id_alumno)
				inner join prestamo_libro on prestamo.num_prestamo = prestamo_libro.num_prestamo)
				inner join libro on prestamo_libro.isbn = libro.isbn)
				where libro.isbn = '$tmp' 
				order by prestamo.fecha_prestamo desc");
				if(mysqli_num_rows($temp) == 0){
					echo"
					<div style='font-size: 20px; text-align: center; padding: 100px'>
							<img src='../IMG/lentes.png' title ='No disponible'> Por el momento el libro no cuenta con historial de prestamos
					</div>
					";
				}
				else{
					
					$aux = mysqli_query($link,"select libro.isbn, libro.nombre_libro, autor.nombre_autor, libro.editorial, libro.imagen 
					from (((libro
					inner join libro_autor on libro.isbn = libro_autor.isbn)
					inner join autor on autor.id_autor = libro_autor.num_autor)
					inner join prestamo_libro on prestamo_libro.isbn = libro.isbn)
					where libro.isbn= '$tmp'");

					$row=mysqli_fetch_array($aux);
					echo"<div class='container-fluid' style='padding-left:20%; padding-right:20%; margin:auto;'>";
						echo"<div class='row'>";
							echo"<div class='col-md-6 col-offset-md-6' style='padding-top:15px; padding-bottom:15px;'>";

							echo"<input type='text' name='isbn' id='isbn' value='$row[0]' hidden>";
									echo"<div class='row'>";
										echo"<div class='col-md-6'><img class='img-thumbnail' src='".$row[4]."' width='248px' height='400px'></div>";
										echo"<div class='col-md-6'>";
												echo"<h3>".$row[1]."</h3><br>";
												echo"Autor/es: ".$row[2]."<br>";
												echo"Editorial: ".$row[3]."<br>";
														//echo"</div>";      
													echo"</div>";   
												echo"</div>"; 

										echo"</div>";
								echo"</div>";
						echo"</div>";
					echo"</div>";

					$t = mysqli_query($link,"select prestamo.num_prestamo, estudiante.id, estudiante.nombre,estudiante.ap_pat,estudiante.correo, prestamo.fecha_prestamo
					from (((estudiante
					inner join prestamo on estudiante.id = prestamo.id_alumno)
					inner join prestamo_libro on prestamo.num_prestamo = prestamo_libro.num_prestamo)
					inner join libro on prestamo_libro.isbn = libro.isbn)
					where libro.isbn = '$tmp' and libro.estado = 'No disponible' and prestamo_libro.estado = 'En prestamo'
					order by prestamo.fecha_prestamo desc");

					echo"<div style='font-size: 15px; text-align: center; padding: 5px'>
							<hr style='border-top: 2px solid #E63946;'/>
							<H2>Prestamos Activos</H2>
							<hr style='border-top: 2px solid #E63946;'/>
						</div>";

					if(mysqli_num_rows($t) == 0){
						echo"
						<div style='font-size: 20px; text-align: center; padding: 50px'>
								<img src='../IMG/pen.png' title ='No disponible'> No hay prestamos recientes
						</div>
						";	
					}
					else{
						echo'<div class="containter-fluid" style="padding-left:15%; padding-right:15%;">';
						echo'<div class="row recent-posts">';
						while($row2=mysqli_fetch_array($t)){
							echo"<div class='col-sm-6' style='padding-top:15px; padding-bottom:15px;'>";
							echo"<div class='row'>";
								echo"<div class='col-md-8'>";
											echo '<h3> Datos del prestamo #'." ". $row2[0].'</h3><br>';
											echo "<b>ID Alumno:</b> ".$row2[1]."<br>";
											echo"<b>Nombre del alumno:</b> ".$row2[2]."<br>";
											echo"<b>Apellido Paterno:</b> ".$row2[3]."<br>";
											echo"<b>Correo institucional:</b> ".$row2[4]."<br>";
											echo"<b>Fecha de prestamo:</b> ".date("d/m/Y",strtotime($row2[5]))."<br>";
											echo"<div class='row' 'style='width:50%; padding-top:15px; padding-bottom:15px; padding-right:0px; align-content:center;'>";
											//echo'<div class="col-md-6"><a href="editar_libro.php?isbn=' .$row['isbn'].'">Editar</a></div>';
											//echo'<div class="col-md-6"><a href="editar_libro.php?isbn=' .$row['isbn'].'">Eliminar</a></div>';
											//echo'<div class="col-md-6"><button id="boton_menu" onclick="location.href ="editar_libro.php?isbn=' .$row['isbn'].'" type="submit">Editar</button> </div>';
											//echo'<div class="col-md-6"><button id="boton_menu" onclick="location.href ="editar_libro.php?isbn=' .$row['isbn'].'">Editar</button> </div>';
											echo"</div>";   
										echo"</div>"; 

								echo"</div>";
							echo"</div>";
							}
						echo"</div>";
                    echo"</div>";
					}
					

					$r = mysqli_query($link,"select e.num_prestamo,e.id_alumno,e.nombre_alumno,e.correo,e.fecha_prestamo,f.fecha_devolucion
					from
					( 
						select c.num_prestamo,d.isbn, d.nombre_libro,c.fecha_prestamo,c.id_alumno,c.nombre_alumno,c.correo
						from
						(
							select a.num_prestamo,a.isbn,a.id_alumno,a.fecha_prestamo,b.nombre_alumno,b.correo
							from
									(
										select prestamo_libro.num_prestamo,prestamo_libro.isbn,prestamo.id_alumno,prestamo.fecha_prestamo from
										prestamo_libro inner join prestamo on prestamo.num_prestamo = prestamo_libro.num_prestamo where prestamo_libro.isbn = '$tmp'
									) a
							left join
									(select id, concat_WS(' ',estudiante.nombre,estudiante.ap_pat) as nombre_alumno, correo from estudiante) b
							on (a.id_alumno = b.id)
							
							order by a.fecha_prestamo 
						) c
						left join
						(
							select libro.isbn, libro.nombre_libro from libro 
						) d
						on(c.isbn = d.isbn)
						where c.isbn = '$tmp'   
					) e
					join
					(
						select devolucion.num_prestamo,devolucion.id_alumno,devolucion.fecha_prestamo,devolucion_libro.fecha_devolucion 
						from devolucion inner join devolucion_libro on devolucion.num_prestamo = devolucion_libro.num_prestamo where devolucion_libro.isbn = '$tmp' 
					) f
					on (e.num_prestamo = f.num_prestamo)
					where e.isbn = '$tmp'
					order by e.fecha_prestamo,f.fecha_devolucion desc;");


						echo"<div style='font-size: 15px; text-align: center; padding: 5px'>
						<hr style='border-top: 2px solid #E63946;'/>
						<H2>Prestamos Antiguos</H2>
						<hr style='border-top: 2px solid #E63946;'/>
						</div>";
					if(mysqli_num_rows($r) == 0){
						echo"
						<div style='font-size: 20px; text-align: center; padding: 50px'>
								<img src='../IMG/pen.png' title ='No disponible'> No hay prestamos antiguos
						</div>
						";	
					}
					else{
						echo'<div class="containter-fluid" style="padding-left:15%; padding-right:15%;">';
						echo'<div class="row recent-posts">';
						while($row3=mysqli_fetch_array($r)){
							echo"<div class='col-sm-6' style='padding-top:15px; padding-bottom:15px;'>";
							echo"<div class='row'>";
								echo"<div class='col-md-8'>";
											echo '<h3> Datos del prestamo #'." ". $row3[0].'</h3><br>';
											echo "<b>ID Alumno:</b> ".$row3[1]."<br>";
											echo"<b>Nombre del alumno:</b> ".$row3[2]."<br>";
											echo"<b>Correo institucional:</b> ".$row3[3]."<br>";
											echo"<b>Fecha de prestamo:</b> ".date("d/m/Y",strtotime($row3[4]))."<br>";
											echo"<b>Fecha de devolucion:</b> ".date("d/m/Y",strtotime($row3[5]))."<br>";
											echo"<div class='row' 'style='width:50%; padding-top:15px; padding-bottom:15px; padding-right:0px; align-content:center;'>";
											//echo'<div class="col-md-6"><a href="editar_libro.php?isbn=' .$row['isbn'].'">Editar</a></div>';
											//echo'<div class="col-md-6"><a href="editar_libro.php?isbn=' .$row['isbn'].'">Eliminar</a></div>';
											//echo'<div class="col-md-6"><button id="boton_menu" onclick="location.href ="editar_libro.php?isbn=' .$row['isbn'].'" type="submit">Editar</button> </div>';
											//echo'<div class="col-md-6"><button id="boton_menu" onclick="location.href ="editar_libro.php?isbn=' .$row['isbn'].'">Editar</button> </div>';
											echo"</div>";   
										echo"</div>"; 

								echo"</div>";
							echo"</div>";
							}
						echo"</div>";
                    echo"</div>";
					}
					
				}
				
				

            ?>
            
                    
                    

		<!--table align="Center" width="75%" cellpadding="5">
			
			<tr align="left">
				<td align="center" rowspan="2"><img src="../IMG/portada.jpg" title ="libro"></a></td>
				<td align="left">
					<div>
						<h3>Titulo del libro</h3>
						APELLIDO/s, NOMBRE AUTOR/ES<br><br>
						Año de publicacion:	Año<br>
						Editorial:	Sample<br>
						Edicion:	Sample<br><br>
					</div>
				</td>
			</tr>

			<tr>
				<td align="left">
					<div>
						<h3>Datos del prestamo </h3>
						Numero del prestamo: 12364 <br>
						Nombre del Alumno: Sample <br>
						Apellido paterno: Sample <br>
						Fecha de prestamo:	dd/mm/aaaa<br>
						Fecha de devolucion: <br><br>	
					
						Disponible:NO<br>
					</div>
				</td>
			</tr>
		</table-->	
	</body>

</HTML>