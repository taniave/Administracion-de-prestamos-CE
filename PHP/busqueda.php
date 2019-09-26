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
					<a href="biblioteca.php"><img src="../IMG/back.png"></a>
			</div>
			
		</div>

    <?php

    include("conex.php");
    $link=conectarse();

    $s = $_POST['query'];
    $op = $_POST['buscar'];
    
    
    switch($op){
        case "titulo":
            
            $query = "select libro.isbn, libro.nombre_libro, group_concat(autor.nombre_autor) as nombre_autor, libro.anio,libro.pais_origen,libro.editorial, libro.edicion, libro.imagen,estado 
            from ((libro
            inner join libro_autor on libro.isbn = libro_autor.isbn)
            inner join autor on autor.id_autor = libro_autor.num_autor)
            where libro.nombre_libro like '%$s%' and libro.estado != 'Eliminado'
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
            
            $query = "select libro.isbn, libro.nombre_libro, group_concat(autor.nombre_autor) as nombre_autor, libro.anio,libro.pais_origen,libro.editorial, libro.edicion, libro.imagen 
            from ((libro
            inner join libro_autor on libro.isbn = libro_autor.isbn)
            inner join autor on autor.id_autor = libro_autor.num_autor)
            where libro.isbn like '%$s%' and libro.estado != 'Eliminado'
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
            
            $query = "select libro.isbn, libro.nombre_libro, autor.nombre_autor, libro.anio,libro.pais_origen,libro.editorial, libro.edicion, libro.imagen,estado 
            from ((libro
            inner join libro_autor on libro.isbn = libro_autor.isbn)
            inner join autor on autor.id_autor = libro_autor.num_autor)
            where autor.nombre_autor like '%$s%' and libro.estado != 'Eliminado'";// limit $startFrom,$showRecordPerPage";
        
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
    <div class="containter-fluid" style="padding-left:10%; padding-right:10%;">
                <div class="row recent-posts">
            
                <?php

                while($row=mysqli_fetch_array($result)){
                            $var = "<img class='img-thumbnail' src='".$row["imagen"]."' width='248px' height='400px'>";
                            printf("

                            <div class='col-sm-6' style='padding-top:15px; padding-bottom:15px;'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                    %s  
                                    </div>
                                    <div class='col-md-8'>
                                        <h3>%s</h3> <br>
                                        %s <br>
                                        
                                        ISBN: %s <br>
                                        Año de publicacion: %d <br><br>
                                        Editorial: %s<br>
                                        Edicion: %s<br>
                                        Pais de Origen: %s<br>
                                    </div> 
                                    
                                </div>
                            </div>
                            ",$var,$row["nombre_libro"],strtoupper($row["nombre_autor"]),$row["isbn"],$row["anio"],$row["editorial"],$row["edicion"],$row["pais_origen"]);
                            
                    }
                        

                mysqli_free_result($result);
                mysqli_close($link);
                ?> 

                </div>
            </div><!-- FINAL DEL CONTAINER FLUID-->

    
</body>
</html>