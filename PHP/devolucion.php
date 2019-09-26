<!DOCTYPE html>
<?php  include("seguridad.php"); ?>
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
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="../JS/login.js"></script>

	</head>
	<body style="font-family: Roboto Condensed; font-size: 15px;">

		<Banner> Administrar Prestamos </Banner>

		<div id="menu-top">
			<a href="home_admin.php"><img src="../IMG/back.png"></a>
        </div>
        <div id="menu-top">

                <form method="POST" action="busqueda_dev.php" name="search" >
					
                    <select name="buscar" id="buscar">
                        <option selected name="select" value="titulo">Titulo</option>
                        <option name="select" value="autor">Autor</option>	
                    </select>
                    <input type="text" name="query" id="query" placeholder="Buscar" required>
                    <button onclick="buscar_libro()" style="color: white;">Buscar</button>
                    
                </form>
	
		</div>

            <?php
                include("conex.php");

                $link=conectarse();

                $showRecordPerPage = 8;
                if(isset($_GET['page']) && !empty($_GET['page'])){
                    $currentPage = $_GET['page'];
                }
                else{
                    $currentPage = 1;
                }

                $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
                
                $totalLibro = mysqli_query($link,"select prestamo.num_prestamo,concat_WS(' ',estudiante.nombre,estudiante.ap_pat) as nombre_alumno,prestamo.fecha_prestamo, libro.nombre_libro,group_concat(autor.nombre_autor) as nombre_autor,libro.imagen
				from (((((estudiante
				inner join prestamo on estudiante.id = prestamo.id_alumno)
				inner join prestamo_libro on prestamo.num_prestamo = prestamo_libro.num_prestamo)
				inner join libro on prestamo_libro.isbn = libro.isbn)
				inner join libro_autor on libro.isbn = libro_autor.isbn)
				inner join autor on autor.id_autor = libro_autor.num_autor)
				where prestamo_libro.estado = 'En prestamo'
				group by libro_autor.isbn
				order by prestamo.fecha_prestamo desc");
                $total = mysqli_num_rows($totalLibro);

                $lastPage = ceil($total/$showRecordPerPage);
                
                $firstPage = 1;

                $nextPage = $currentPage + 1;
                $previousPage = $currentPage - 1;
				
                $result=mysqli_query($link,"select prestamo.num_prestamo,concat_WS(' ',estudiante.nombre,estudiante.ap_pat) as nombre_alumno,prestamo.fecha_prestamo, libro.nombre_libro, group_concat(autor.nombre_autor) as nombre_autor,libro.imagen
				from (((((estudiante
				inner join prestamo on estudiante.id = prestamo.id_alumno)
				inner join prestamo_libro on prestamo.num_prestamo = prestamo_libro.num_prestamo)
				inner join libro on prestamo_libro.isbn = libro.isbn)
				inner join libro_autor on libro.isbn = libro_autor.isbn)
				inner join autor on autor.id_autor = libro_autor.num_autor)
				where prestamo_libro.estado = 'En prestamo'
				group by libro_autor.isbn
				order by prestamo.fecha_prestamo desc limit $startFrom,$showRecordPerPage");
                

                if(mysqli_num_rows($result) == 0){
                    echo"
                    <div style='font-size: 20px; text-align: center; padding: 100px'>
                         <img src='../IMG/lentes.png' title ='No disponible'> Por el momento no hay libros en prestamo
                    </div>
                    ";
                }
                else{
                ?>
                <form align='center' method='GET' action='ficha_devolucion.php' >
                <div class="containter-fluid" style="padding-left:10%; padding-right:10%;">
                    <div class="row recent-posts">

                    <?php
                    
                        while($row=mysqli_fetch_assoc($result)){
                            $var = "<img class='img-thumbnail' src='".$row["imagen"]."'>";
                           

                            echo"<div class='col-sm-6' style='padding-top:15px; padding-bottom:15px;'>";
                                echo"<div class='row'>";
                                    echo"<div class='col-md-4'>".$var."</div>";
                                    echo"<div class='col-md-8'>";
                                                echo"<h3>". $row["nombre_libro"]."</h3>";
                                                echo strtoupper($row["nombre_autor"])."<br>";
												echo"<b>Nombre del alumno:</b> ".$row["nombre_alumno"]."<br>";
												echo"<b>Fecha prestamo:</b> ".date('d/m/Y',strtotime($row["fecha_prestamo"]))."<br>";
                                                echo"<div class='row' 'style='width:50%; padding-top:15px; padding-bottom:15px; padding-right:0px; align-content:center;'>";
												echo'<div class="col-md-6" id="modificar"><a href="ficha_devolucion.php?num_prestamo=' .$row['num_prestamo'].'">Editar</a></div>';
                                                echo"</div>";   
                                            echo"</div>"; 

                                    echo"</div>";
                                echo"</div>";
                              }
                    
                    //printf("</tr>");
                    mysqli_free_result($result);
                    mysqli_close($link);
                    } 
                   
                    ?> 
                    </div>
                </div><!-- FINAQL DEL CONTAINER FLUID-->
            </form>
            
            <nav aria-label="Page navigation">
				<ul class="pagination">
					<?php if($currentPage != $firstPage) { ?>
					<li class="page-item">
						<a class="page-link" href="?page= <?php echo $firstPage ?>" tabindex ="-1" aria-laber="Anterior">
						<span aria-hidden="true">Primera</span>
						</a>
					</li>
					<?php }
					if($currentPage >= 2){ ?>
						<li class="page-item">
							<a class="page-link" href="?page= <?php echo $previousPage ?>">
							<?php echo $previousPage ?>
							</a>
						</li>
						<?php } ?>
						<li class="page-item active">
							<a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?>
							</a>
						</li>

						<?php if($currentPage != $lastPage) { ?>

						<li class="page-item">
							<a class="page-link" href="?page=<?php echo $nextPage ?>">
							<?php echo $nextPage ?></a>
						</li>

						<li class="page-item">
							<a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
							<span aria-hidden="true">Ultima</span>
							</a>
						</li>
						<?php } ?>
				</ul>
			</nav>
		
	</body>






















































































































































































































































































































































































































































































	<!--body style="font-family: Roboto Condensed; font-size: 15px;">

		<Banner> Administrar Prestamos </Banner>

		<div id="menu-top">
			<a href="../home_admin.html"><img src="../IMG/back.png"></a>
        </div>
        <div id="menu-top">

				<form method="POST" action="PHP/busqueda.php" name="search" >
						
					<select name="buscar" id="buscar">
						<option selected name="select">Titulo</option>
						<option name="select">Autor</option>
						<option name="select">ISBN</option>	
					</select>
					<input type="text" name="query" id="query" placeholder="Buscar" required>
					<button onclick="buscar_libro()" style="color: white;">Buscar</button>
					
				</form>
	
		</div>
		<--?php
            
			
			$showRecordPerPage = 8;
			if(isset($_GET['page']) && !empty($_GET['page'])){
				$currentPage = $_GET['page'];
			}
			else{
				$currentPage = 1;
			}

			$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;

			$totalLibro = mysqli_query($link,"select libro.nombre_libro, autor.nombre_autor,libro.editorial,libro.imagen
			from (((((estudiante
			inner join prestamo on estudiante.id = prestamo.id_alumno)
			inner join prestamo_libro on prestamo.num_prestamo = prestamo_libro.num_prestamo)
			inner join libro on prestamo_libro.isbn = libro.isbn)
			inner join libro_autor on libro.isbn = libro_autor.isbn)
			inner join autor on autor.id_autor = libro_autor.num_autor)
			order by prestamo.num_prestamo");
			$total = mysqli_num_rows($totalLibro);

			$lastPage = ceil($total/$showRecordPerPage);
			
			$firstPage = 1;

			$nextPage = $currentPage + 1;
			$previousPage = $currentPage - 1;

            $result=mysqli_query($link,"select libro.nombre_libro, autor.nombre_autor,libro.editorial,libro.imagen
			from (((((estudiante
			inner join prestamo on estudiante.id = prestamo.id_alumno)
			inner join prestamo_libro on prestamo.num_prestamo = prestamo_libro.num_prestamo)
			inner join libro on prestamo_libro.isbn = libro.isbn)
			inner join libro_autor on libro.isbn = libro_autor.isbn)
			inner join autor on autor.id_autor = libro_autor.num_autor)
			order by prestamo.num_prestamo limit $startFrom,$showRecordPerPage");  
        ?>

<form align='center' method='GET' action='libro.php'>
        <div class="containter-fluid" style="padding-left:10%; padding-right:10%;">
            <div class="row recent-posts">

            <--?php
            
                while($row=mysqli_fetch_assoc($result)){
					$var = '<img class="img-thumbnail" src="'.$row["imagen"].'">';
					
                    echo"<div class='col-sm-6' style='padding-top:15px; padding-bottom:15px;'>";
                        echo"<div class='row'>";
                            echo"<div class='col-md-4'>".$var."</div>";
                            echo"<div class='col-md-8'>";
                                        echo'<a href="libro.php?isbn=' .$row['isbn'].'"> <h3>'. $row['nombre_libro'].'</h3></a>';
                                        echo strtoupper($row["nombre_autor"])."<br>";
                                        echo"Editorial: ".$row["editorial"]."<br>";
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
            
            //printf("</tr>");
            mysqli_free_result($result);
            mysqli_close($link);
             
            //echo"<script> location.reload() </script>";
            ?> 
            </div>
        </div><-- FINAL DEL CONTAINER FLUID-->
    <!--/form>





















            <--?php
                include("conex.php");

				
				$aux = "select prestamo.num_prestamo, estudiante.nombre,estudiante.ap_pat,libro.nombre_libro, autor.nombre_autor
						from (((((estudiante
						inner join prestamo on estudiante.id = prestamo.id_alumno)
						inner join prestamo_libro on prestamo.num_prestamo = prestamo_libro.num_prestamo)
						inner join libro on prestamo_libro.isbn = libro.isbn)
						inner join libro_autor on libro.isbn = libro_autor.isbn)
						inner join autor on autor.id_autor = libro_autor.num_autor)
						order by prestamo.num_prestamo";

        		$result = mysqli_query($link,$aux) or die(mysqli_error($link));

            
                if(mysqli_num_rows($result) == 0){
                    echo"
                    <div style='font-size: 20px; text-align: center; padding: 100px'>
                         <img src='../IMG/lentes.png' title ='No disponible'> Por el momento no hay libros disponibles
                    </div>
                    ";
                }
                else{
                ?>
                <form align='center' method='GET' action='ficha_devolucion.php'>
                    <table align="center"  border="" style='padding-top: 10px; padding-bottom: 10px;'>
                    
                    <--?php
                    //printf("<tr>");
					echo "<tr> <th>PRESTAMO</th><th>NOMBRE</th><th>APELLIDO PATERNO</th><th>LIBRO</th><th>AUTOR</th> <th></th></tr>";                    
					while($row=mysqli_fetch_array($result)){
                        
                        echo "<tr>";
                            echo"<td style='padding-top: 10px; padding-bottom: 10px;'> ".$row["num_prestamo"]."<br></td>";       
                            echo"<td style='padding-top: 10px; padding-bottom: 10px;'>". $row["nombre"]."<br> </td>";
                            echo"<td style='padding-top: 10px; padding-bottom: 10px;'> ".$row["ap_pat"]."<br></td>";
                            echo"<td style='padding-top: 10px; padding-bottom: 10px;'> ".$row["nombre_libro"]."<br></td>";
                            echo"<td style='padding-top: 10px; padding-bottom: 10px;'> ".$row["nombre_autor"]."<br></td>";
                            echo'<td style="padding-top: 10px; padding-bottom: 10px;"> <a href="ficha_devolucion.php?num_prestamo=' .$row['num_prestamo'].'">Editar</a></td>';
                        echo "</tr>";
                            
                            
                        }
                    //printf("</tr>");
                    mysqli_free_result($result);
                    mysqli_close($link);
                    }
                    //echo"<script> location.reload() </script>";
                    ?> 

                </table>
            </form>   
		
	</body-->

</HTML>