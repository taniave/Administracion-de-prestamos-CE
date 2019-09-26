
<!DOCTYPE html>
<?php  include("seguridad.php"); ?>
<HTML>
	<head>  

		<title> Administrador </title>
		<meta charset="UTF-8">

		<script> document.createElement("Banner") </script>
		<link rel="stylesheet" type="text/css" href="../CSS/menu.css">
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
		<style type="text/css">
            .libro{
                border: 0px;
                background: transparent;
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
            }
        </style>

	</head>

	<body style="font-family: Roboto Condensed; font-size:15px;">
		
		<Banner>Biblioteca</Banner>
			
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

			<?php
				include("conex.php");
            	$link=conectarse();
            	//session_start();
				$va = $_SESSION['user'];
				
				
				$query=mysqli_query($link,"select libro.isbn,libro.imagen, count(*) as frecuencia
				from ((libro 
				inner join prestamo_libro on libro.isbn = prestamo_libro.isbn)
				inner join prestamo on prestamo_libro.num_prestamo = prestamo.num_prestamo)
				where month(prestamo.fecha_prestamo) = month(curdate())
				group by nombre_libro
				order by frecuencia desc
				limit 5");

				$date = date('M');

				switch($date){
					case "January":
						$mes = 'Enero';
						break;
					case "February":
						$mes = 'Febrero';
						break;
					case "March":
						$mes = 'Marzo';
						break;
					case "April":
						$mes = 'Abril';
						break;
					case "May":
						$mes = 'Mayo';
						break;
					case "June":
						$mes = 'Junio';
						break;
					case "July":
						$mes = 'July';
						break;
					case "August":
						$mes = 'Agosto';
						break;
					case "September":
						$mes = 'Septiembre';
						break;
					case "October":
						$mes = 'Octubre';
						break;
					case "November":
						$mes = 'Noviembre';
						break;
					case "December":
						$mes = 'Diciembre';
						break;
					default:
						break;
				}

			?>

			<div class="container">
					
					<div class="panel panel-default">
					  <div class="panel-heading" style="background-color:#E84B56; color:white;"><h3 align="center">Top 5: Libros Favoritos de <?php echo $mes; ?></h3></div>
					  <div class="panel-body"  >
							<div class="containter-fluid" style="text-align: center; padding: none;" >
								<div class="row" style="text-align: center; padding: none;">

								<?php
								
									while($row=mysqli_fetch_array($query)){
										$var = '<a href="consulta_prestamo.php?isbn=' .$row['isbn'].'"> <img class="img-thumbnail" src="'.$row["imagen"].'" height="60%" width="55%"></a>';
										echo"<div class='col-md-2'>".$var."</div>";
										//echo"<div class='col-md-2'>".$row['nombre_libro']."</div>";
										
									}
									
									
								?> 
								</div>
							</div>
					  </div>
					</div>
			</div>
			<div class="container">
					
					<div class="panel panel-default">
					  <div class="panel-heading" style="background-color:#E84B56; color:white;"><h3 align="center">Libros que no han sido devueltos por mas de un año</h3></div>
					  <div class="panel-body"  >
							<div class="containter-fluid" style="text-align: center; padding: none;" >
								<div class="row" style=" align-content: center; padding:none; background-color:#ACB5C1">
											<div class="col-md-3"style="text-align: center;"><b>Titulo del libro</b></div>
											<div class="col-md-2"style="text-align: center;"><b>Fecha de prestamo</b></div>
											<div class="col-md-2"style="text-align: center;"><b>ID del Alumno</b></div>
											<div class="col-md-2"style="text-align: center;"><b>Nombre del Alumno</b></div>
											<div class="col-md-2"style="text-align: center;"><b>Contacto</b></div>
									</div>

								<?php
									$lost = mysqli_query($link,"select d.nombre_libro,c.fecha_prestamo,c.id_alumno,c.nombre_alumno,c.correo
									from
									(
										select a.num_prestamo,a.isbn,a.id_alumno,a.fecha_prestamo,b.nombre_alumno,b.correo
										from
											 (select prestamo_libro.num_prestamo,prestamo_libro.isbn,prestamo.id_alumno,prestamo.fecha_prestamo from prestamo_libro inner join prestamo on prestamo.num_prestamo = prestamo_libro.num_prestamo where estado = 'En prestamo') a
										left join
											 (select id, concat_WS(' ',estudiante.nombre,estudiante.ap_pat) as nombre_alumno, correo from estudiante) b
										on (a.id_alumno = b.id)
										where year(a.fecha_prestamo) < year(curdate())
										order by a.fecha_prestamo 
									) c
									left join
									(
										select libro.isbn, libro.nombre_libro from libro where estado = 'No disponible'
									) d
									on(c.isbn = d.isbn)
									order by c.fecha_prestamo"); 

									while($l=mysqli_fetch_array($lost)){
										echo"<div class='row' style='text-align: center; padding: none;' >";
											echo"<div class='col-md-3'style='text-align: center;'>".$l["nombre_libro"]."</div>";
											echo"<div class='col-md-2'style='text-align: center;'>".date("d/m/Y",strtotime($l["fecha_prestamo"]))."</div>";
											echo"<div class='col-md-2'style='text-align: center;'>".$l["id_alumno"]."</div>";
											echo"<div class='col-md-2'style='text-align: center;'>".$l["nombre_alumno"]."</div>";
											echo"<div class='col-md-2'style='text-align: center;'>".$l["correo"]."</div>";
										echo"</div>";
										echo"<hr/>";
									}
									
								?> 
								</div>
							</div>
					  </div>
					</div>
			</div>						
			<div class="container">
					
						<div class="panel panel-default" >
								<div class="panel-heading" style="background-color:#E84B56; color:white;"><h3 align="center">Reportes de Prestamos</h3>
										
								</div>
								<div class="panel-body">
								<form method="GET" action="home_admin.php" name="reporte">
									<div class="row" style="text-align: center; padding: none;">
										<div class="col-md-6"style="text-align: center;">
												Periodo: <select name="filtro" id="filtro">
													<option name="select">Primavera</option>
													<option name="select">Otoño</option>
													<option name="select">Anual</option>
												</select>
												
										</div>
										<div class="col-md-6"style="text-align: center;">
												 Año: <select name="filtro2" id="filtro2">
													<?php
														$fil = mysqli_query($link, "select distinct year(fecha_prestamo) as year from prestamo");
														while($r=mysqli_fetch_array($fil)){
															echo"<option>".$r['year']."</option>";
														}
													?>
												</select>
												<button>Generar</button>
										</div>
									</div>

								</form>

									<div class="row" style=" align-content: center; padding:none; background-color:#ACB5C1">
											<div class="col-md-3"style="text-align: center;"><b>Titulo del libro</b></div>
											<div class="col-md-3"style="text-align: center;"><b>Autor</b></div>
											<div class="col-md-3"style="text-align: center;"><b>Editorial</b></div>
											<div class="col-md-3"style="text-align: center;"><b>Frecuencia</b></div>
									</div>
									<?php
									
									
									$a = $_GET['filtro2'];
									

									switch($_GET['filtro']){

										
										case 'Anual':
											$reporte=mysqli_query($link,"select q.nombre_libro, q.nombre_autor, q.editorial, q2.frecuencia
											from
												(select distinct libro.nombre_libro,group_concat(autor.nombre_autor) as nombre_autor, libro.editorial
												from ((libro
												inner join libro_autor on libro.isbn = libro_autor.isbn)
												inner join autor on autor.id_autor = libro_autor.num_autor)
												group by libro_autor.isbn) q
											
											inner join
											
												(select nombre_libro, count(*) as frecuencia
												from ((libro
												inner join prestamo_libro on libro.isbn = prestamo_libro.isbn)
												inner join prestamo on prestamo_libro.num_prestamo = prestamo.num_prestamo)
												where year(prestamo.fecha_prestamo) = '$a'
												group by libro.nombre_libro) q2
											
											on (q.nombre_libro = q2.nombre_libro)
											order by q2.frecuencia desc");

											while($res=mysqli_fetch_array($reporte)){
												echo"<div class='row' style='text-align: center; padding: none;' >";
													echo"<div class='col-md-3'style='text-align: center;'>".$res["nombre_libro"]."</div>";
													echo"<div class='col-md-3'style='text-align: center;'>".$res["nombre_autor"]."</div>";
													echo"<div class='col-md-3'style='text-align: center;'>".$res["editorial"]."</div>";
													echo"<div class='col-md-3'style='text-align: center;'>".$res["frecuencia"]."</div>";
												echo"</div>";
												echo"<hr/>";
											}
											break;
										
										case 'Primavera':
											$reporte=mysqli_query($link,"select q.nombre_libro, q.nombre_autor, q.editorial, q2.frecuencia
											from
												(select distinct libro.nombre_libro,group_concat(autor.nombre_autor) as nombre_autor, libro.editorial
												from ((libro
												inner join libro_autor on libro.isbn = libro_autor.isbn)
												inner join autor on autor.id_autor = libro_autor.num_autor)
												group by libro_autor.isbn) q
											
											inner join
											
												(select nombre_libro, count(*) as frecuencia
												from ((libro
												inner join prestamo_libro on libro.isbn = prestamo_libro.isbn)
												inner join prestamo on prestamo_libro.num_prestamo = prestamo.num_prestamo)
												where year(prestamo.fecha_prestamo) = '$a' and month(prestamo.fecha_prestamo) between 1 and 6
												group by libro.nombre_libro) q2
											
											on (q.nombre_libro = q2.nombre_libro)
											order by q2.frecuencia desc");

											while($res=mysqli_fetch_array($reporte)){
												echo"<div class='table-responsive' style='text-align: center; padding: none;' >";
													echo"<div class='col-md-3'style='text-align: center;'>".$res["nombre_libro"]."</div>";
													echo"<div class='col-md-3'style='text-align: center;'>".$res["nombre_autor"]."</div>";
													echo"<div class='col-md-3'style='text-align: center;'>".$res["editorial"]."</div>";
													echo"<div class='col-md-3'style='text-align: center;'>".$res["frecuencia"]."</div>";
												echo"</div>";
												echo"<hr/>";

											}
											break;
										
										case 'Otoño':
											$reporte=mysqli_query($link,"select q.nombre_libro, q.nombre_autor, q.editorial, q2.frecuencia
											from
												(select distinct libro.nombre_libro,group_concat(autor.nombre_autor) as nombre_autor, libro.editorial
												from ((libro
												inner join libro_autor on libro.isbn = libro_autor.isbn)
												inner join autor on autor.id_autor = libro_autor.num_autor)
												group by libro_autor.isbn) q
											
											inner join
											
												(select nombre_libro, count(*) as frecuencia
												from ((libro
												inner join prestamo_libro on libro.isbn = prestamo_libro.isbn)
												inner join prestamo on prestamo_libro.num_prestamo = prestamo.num_prestamo)
												where year(prestamo.fecha_prestamo) = '$a' and month(prestamo.fecha_prestamo) between 7 and 12
												group by libro.nombre_libro) q2
											
											on (q.nombre_libro = q2.nombre_libro)
											order by q2.frecuencia desc");

											while($res=mysqli_fetch_array($reporte)){
												echo"<div class='row' style='text-align: center; padding: none;' >";
													echo"<div class='col-md-3'style='text-align: center;'>".$res["nombre_libro"]."</div>";
													echo"<div class='col-md-3'style='text-align: center;'>".$res["nombre_autor"]."</div>";
													echo"<div class='col-md-3'style='text-align: center;'>".$res["editorial"]."</div>";
													echo"<div class='col-md-3'style='text-align: center;'>".$res["frecuencia"]."</div>";
												echo"</div>";
												echo"<hr/>";
											}
											break;
										default:
											break;
									}
										
									?>
									
								</div>
						</div>
			</div>

			
	</body>

</HTML>