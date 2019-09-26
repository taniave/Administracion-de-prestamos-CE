<!DOCTYPE html>

<HTML>
	<head>  

		<title> Sala de Lectura</title>
		<meta charset="UTF-8">

		<script> document.createElement("Banner") </script>
		<script> document.createElement("Banner2") </script>
		<link rel="stylesheet" type="text/css" href="../CSS/menu.css">
		<link rel="stylesheet" type="text/css" href="../CSS/formulario.css">
		
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
				text-align: left;
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

		<Banner> Biblioteca </Banner>

		<div id="menu-top">
			
			<ul id="lista"> <!--  -->
				<button id="boton_menu" onclick="location.href ='../index.html'">Inicio</button>
				<button id="boton_menu" onclick="location.href ='../conocenos.html'">Conócenos</button>
				<button id="boton_menu" onclick="location.href ='biblioteca.php'">Biblioteca</button>
				<button id="boton_menu" onclick="location.href ='../ubicacion.html'">Ubicación</button>
			</ul>
			<form method="POST" action="busqueda.php" name="search">
					
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

			$totalLibro = mysqli_query($link,"select libro.isbn, libro.nombre_libro, group_concat(autor.nombre_autor) as nombre_autor, libro.anio,libro.pais_origen,libro.editorial, libro.edicion, libro.imagen,libro.estado 
			from ((libro
			inner join libro_autor on libro.isbn = libro_autor.isbn)
			inner join autor on autor.id_autor = libro_autor.num_autor)
			where libro.estado != 'Eliminado'
			group by libro_autor.isbn,libro.nombre_libro");
			$total = mysqli_num_rows($totalLibro);

			$lastPage = ceil($total/$showRecordPerPage);
			
			$firstPage = 1;

			$nextPage = $currentPage + 1;
			$previousPage = $currentPage - 1;

            $result=mysqli_query($link,"select libro.isbn, libro.nombre_libro, group_concat(autor.nombre_autor) as nombre_autor, libro.anio,libro.pais_origen,libro.editorial, libro.edicion, libro.imagen,libro.estado 
			from ((libro
			inner join libro_autor on libro.isbn = libro_autor.isbn)
			inner join autor on autor.id_autor = libro_autor.num_autor)
			where libro.estado != 'Eliminado'
			group by libro_autor.isbn limit $startFrom,$showRecordPerPage");  
        ?>
		<form align='center' method='GET' action='libro.php'>
        <div class="containter-fluid" style="padding-left:10%; padding-right:10%;">
            <div class="row recent-posts">

            <?php
            
                while($row=mysqli_fetch_assoc($result)){
					$var = '<a href="libro.php?isbn=' .$row['isbn'].'"> <img class="img-thumbnail" src="'.$row["imagen"].'" width="248px" height="400px"></a>';
					
                    echo"<div class='col-sm-6' style='padding-top:15px; padding-bottom:15px;'>";
                        echo"<div class='row'>";
                            echo"<div class='col-md-4'>".$var."</div>";
                            echo"<div class='col-md-8'>";
                                        echo'<a href="libro.php?isbn=' .$row['isbn'].'"> <h3>'. $row['nombre_libro'].'</h3></a>';
                                        echo strtoupper($row["nombre_autor"])."<br>";
                                        echo"Editorial: ".$row["editorial"]."<br>";
                                        echo"<div class='row' 'style='width:50%; padding-top:15px; padding-bottom:15px; padding-right:0px; align-content:center;'>";
											if($row["estado"] == 'Disponible'){
												echo"<font style='color: #579F00'>Disponible</font>";
											}
											else{
												echo"<font style='color:#FF0000'>No disponible</font>";	
											}
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
        </div><!-- FINAL DEL CONTAINER FLUID-->
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
			<Banner2><a href="login_admin.php"><img src="../IMG/admin.png"></a></Banner2>	
	</body>

</HTML>