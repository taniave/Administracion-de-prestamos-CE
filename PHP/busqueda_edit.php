<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    
    <title>Resultados de busqueda</title>

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
        <Banner>Resultados de Busqueda</Banner>

        <div id="menu-top">
			
			<div id="menu-top">
					<a href="editar.php"><img src="../IMG/back.png"></a>
			</div>
			
		</div>
        <?php  include("seguridad.php"); ?>
    <?php

    include("conex.php");
    $link=conectarse();

    $s = $_POST['query'];
    $op = $_POST['buscar'];
    
    /*
    $showRecordPerPage = 8;

    if(isset($_GET['page']) && !empty($_GET['page'])){
        $currentPage = $_GET['page'];
    }
    else{
        $currentPage = 1;
    }

    $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;

*/
    switch($op){
        case "titulo":
            /*
            $totalLibro = mysqli_query($link,"select libro.isbn, libro.nombre_libro, autor.nombre_autor, libro.anio,libro.pais_origen,libro.editorial, libro.edicion, libro.imagen 
            from ((libro
            inner join libro_autor on libro.isbn = libro_autor.isbn)
            inner join autor on autor.id_autor = libro_autor.num_autor)
            where libro.nombre_libro like '%$s%'");
            $total = mysqli_num_rows($totalLibro);

            $lastPage = ceil($total/$showRecordPerPage);
            
            $firstPage = 1;

            $nextPage = $currentPage + 1;
            $previousPage = $currentPage - 1;
            */
            $query = "select libro.isbn, libro.nombre_libro, group_concat(autor.nombre_autor) as nombre_autor, libro.anio,libro.pais_origen,libro.editorial, libro.edicion, libro.imagen 
            from ((libro
            inner join libro_autor on libro.isbn = libro_autor.isbn)
            inner join autor on autor.id_autor = libro_autor.num_autor)
            where libro.nombre_libro like '%$s%' and estado = 'Disponible'
            group by libro_autor.isbn"; // limit $startFrom,$showRecordPerPage";
        
            $result = mysqli_query($link,$query) or die(mysqli_error($link));
        
            if(mysqli_num_rows($result) == 0){
                echo"
                <div style='font-size: 20px; text-align: center; padding: 100px'>
                        <img src='../IMG/lentes.png' title ='No disponible'> No hay coincidencias con su busqueda
                </div>
                ";
            }

            break;

        case "isbn":
            /*
            $totalLibro = mysqli_query($link,"select libro.isbn, libro.nombre_libro, autor.nombre_autor, libro.anio,libro.pais_origen,libro.editorial, libro.edicion, libro.imagen 
            from ((libro
            inner join libro_autor on libro.isbn = libro_autor.isbn)
            inner join autor on autor.id_autor = libro_autor.num_autor)
            where libro.isbn like '%$s%'");
            $total = mysqli_num_rows($totalLibro);

            $lastPage = ceil($total/$showRecordPerPage);
            
            $firstPage = 1;

            $nextPage = $currentPage + 1;
            $previousPage = $currentPage - 1;
            */
            $query = "select libro.isbn, libro.nombre_libro, group_concat(autor.nombre_autor) as nombre_autor, libro.anio,libro.pais_origen,libro.editorial, libro.edicion, libro.imagen 
            from ((libro
            inner join libro_autor on libro.isbn = libro_autor.isbn)
            inner join autor on autor.id_autor = libro_autor.num_autor)
            where libro.isbn like '%$s%' and estado = 'Disponible'
            group by libro_autor.isbn";// limit $startFrom,$showRecordPerPage";
        
            $result = mysqli_query($link,$query) or die(mysqli_error($link));
        
            if(mysqli_num_rows($result) == 0){
                echo"
                <div style='font-size: 20px; text-align: center; padding: 100px'>
                        <img src='../IMG/lentes.png' title ='No disponible'> No hay coincidencias con su busqueda
                </div>
                ";
            }

            break;

        case "autor":
            /*
            $totalLibro = mysqli_query($link,"select libro.isbn, libro.nombre_libro, autor.nombre_autor, libro.anio,libro.pais_origen,libro.editorial, libro.edicion, libro.imagen 
            from ((libro
            inner join libro_autor on libro.isbn = libro_autor.isbn)
            inner join autor on autor.id_autor = libro_autor.num_autor)
            where autor.nombre_autor like '%$s%'");
            $total = mysqli_num_rows($totalLibro);

            $lastPage = ceil($total/$showRecordPerPage);
            
            $firstPage = 1;

            $nextPage = $currentPage + 1;
            $previousPage = $currentPage - 1;
            */
            $query = "select libro.isbn, libro.nombre_libro, group_concat(autor.nombre_autor) as nombre_autor, libro.anio,libro.pais_origen,libro.editorial, libro.edicion, libro.imagen 
			from ((libro
			inner join libro_autor on libro.isbn = libro_autor.isbn)
            inner join autor on autor.id_autor = libro_autor.num_autor)
            where autor.nombre_autor like '%$s%' and estado = 'Disponible'
			group by libro_autor.isbn";// limit $startFrom,$showRecordPerPage";
        
            $result = mysqli_query($link,$query) or die(mysqli_error($link));
        
            if(mysqli_num_rows($result) == 0){
                echo"
                <div style='font-size: 20px; text-align: center; padding: 100px'>
                        <img src='../IMG/lentes.png' title ='No disponible'> No hay coincidencias con su busqueda
                </div>
                ";
            }
            
            break;

        default:
            break;
    }
    ?>
    <form align='center' method='GET' action='editar_libro.php'>
        <div class="containter-fluid" style="padding-left:10%; padding-right:10%;">
            <div class="row recent-posts">

            <?php
            
                while($row=mysqli_fetch_assoc($result)){
                    $var = "<img class='img-thumbnail' src='".$row["imagen"]."'width='248px' height='400px'>";
                    

                    echo"<div class='col-sm-6' style='padding-top:15px; padding-bottom:15px;'>";
                        echo"<div class='row'>";
                            echo"<div class='col-md-4'>".$var."</div>";
                            echo"<div class='col-md-8'>";
                                        echo"<h3>". $row["nombre_libro"]."</h3>";
                                        echo strtoupper($row["nombre_autor"])."<br>";
                                        echo"Editorial: ".$row["editorial"]."<br>";
                                        echo"<div class='row' 'style='width:50%; padding-top:15px; padding-bottom:15px; padding-right:0px; align-content:center;'>";
                                        
                                        echo'<div class="col-md-6" id="modificar"><a href="editar_libro.php?isbn=' .$row['isbn'].'">Editar</a></div>';
                                        echo'<div class="col-md-6" id="modificar"><a href="eliminar_libro.php?isbn=' .$row['isbn'].'">Eliminar</a></div>';
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
        </div><!-- FINAL DEL CONTAINER FLUID-->
    </form>

    <!--nav aria-label="Page navigation">
        <ul class="pagination">
            <--?php if($currentPage != $firstPage) { ?>
            <li class="page-item">
                <a class="page-link" href="?page= <--?php echo $firstPage ?>" tabindex ="-1" aria-laber="Anterior">
                <span aria-hidden="true">First</span>
                </a>
            </li>
            <--?php }
            if($currentPage >= 2){ ?>
                <li class="page-item">
                    <a class="page-link" href="?page= <--?php echo $previousPage ?>">
                    <--?php echo $previousPage ?>
                    </a>
                </li>
                <--?php } ?>
                <li class="page-item active">
                    <a class="page-link" href="?page=<--?php echo $currentPage ?>"><--?php echo $currentPage ?>
                    </a>
                </li>

                <--?php if($currentPage != $lastPage) { ?>

                <li class="page-item">
                    <a class="page-link" href="?page=<--?php echo $nextPage ?>">
                    <--?php echo $nextPage ?></a>
                </li>

                <li class="page-item">
                    <a class="page-link" href="?page=<--?php echo $lastPage ?>" aria-label="Next">
                    <span aria-hidden="true">Ultima</span>
                    </a>
                </li>
                <--?php } ?>
        </ul>
    </nav-->

</body>
</html>