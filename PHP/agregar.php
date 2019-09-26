<!DOCTYPE html>
<?php include("seguridad.php"); ?>
<html>
    <head>
        <meta charset="utf-8">
        
        <title>Agregar libro</title>
        
        <link rel="icon" type="text/css" href="../IMG/pen.png">
        <link rel="stylesheet" type="text/css" href="../CSS/menu.css">
		<link rel="stylesheet" type="text/css" href="../CSS/formulario.css">
        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>

    <body style="font-family: Roboto Condensed;">
            <div id="menu-top">
					<a href="agregar_libro.php"><img src="../IMG/back.png"></a>
			</div>
        <?php
            include("conex.php");
            $link=conectarse();

            $tit = $_POST['title'];
            $anio = $_POST['year'];
            $autor = $_POST['autor'];
            $isbn = $_POST['isbn'];
            $pais = $_POST['pais'];
            $copias = $_POST['copias'];
            $edit = $_POST['edit'];
            $edi = $_POST['ed'];
            $temp = "";
            $target_path='../IMG/';
            $archivo = $_FILES["archivo"]['name'];
            $target_path = $target_path.basename($_FILES['archivo']['name']);

            $aut = explode(',',$autor);
            
            //$disp = $_POST['disponible'];

            //$temp = $isbn.'-'.$copias;
            $query = "select * from libro where isbn = '$temp'";
            $res = mysqli_query($link,$query);

            
            
            if(mysqli_num_rows($res) == 0 && move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)){ // verifica si hay regitros de libros con el mismo isbn
                
                $insert = "insert into libro (isbn,nombre_libro,editorial,edicion,anio,pais_origen,imagen) values('$isbn','$tit','$edit','$edi','$anio','$pais','$target_path')";
                
                mysqli_query($link,$insert) or die(mysqli_error($link));

                if(count($aut) > 1){
                    for($i=0;$i<count($aut);$i++){
                        $query2 = "select * from autor where nombre_autor='$aut[$i]'";
                        $res2 = mysqli_query($link,$query2);
                        //verifica si existe el autor
                        if(mysqli_num_rows($res2) == 0){ //si no existe, agrega el registro
                            $insert_autor = "insert into autor (nombre_autor) values('$aut[$i]')";
                            mysqli_query($link,$insert_autor) or die(mysqli_error($link));
                        }
                        
                        //insertar en las tablas relacionadas
                        $libro_autor = "insert into libro_autor(isbn, num_autor)
                        select libro.isbn, autor.id_autor
                        from libro,autor
                        where libro.isbn = '$isbn' and autor.nombre_autor ='$aut[$i]'";

                        mysqli_query($link,$libro_autor) or die(mysqli_error($link));
                    }
                }
                else{
                        $query2 = "select * from autor where nombre_autor='$autor'";
                        $res2 = mysqli_query($link,$query2);
                        //verifica si existe el autor
                        if(mysqli_num_rows($res2) == 0){ //si no existe, agrega el registro
                            $insert_autor = "insert into autor (nombre_autor) values('$autor')";
                            mysqli_query($link,$insert_autor) or die(mysqli_error($link));
                        }
                        
                        //insertar en las tablas relacionadas
                        $libro_autor = "insert into libro_autor(isbn, num_autor)
                        select libro.isbn, autor.id_autor
                        from libro,autor
                        where libro.isbn = '$isbn' and autor.nombre_autor ='$autor'";

                        mysqli_query($link,$libro_autor) or die(mysqli_error($link));
                }
                

                if($copias >= 2){
                    for($i=2;$i<=$copias;$i++){
                        $temp = $isbn.'-'.$i;
                        $insert = "insert into libro (isbn,nombre_libro,editorial,edicion,anio,pais_origen,imagen) values('$temp','$tit','$edit','$edi','$anio','$pais','$target_path')";
                        mysqli_query($link,$insert) or die(mysqli_error($link));

                        $libro_autor = "insert into libro_autor(isbn, num_autor)
                        select libro.isbn, autor.id_autor
                        from libro,autor
                        where libro.isbn = '$temp' and autor.nombre_autor ='$autor'";

                        mysqli_query($link,$libro_autor) or die(mysqli_error($link));
                    }
                    
                }
                
                //guarda el resultado de la consulta que verifica la insercion de datos
                $result=mysqli_query($link,"select libro.isbn, libro.nombre_libro, group_concat(autor.nombre_autor) as nombre_autor, libro.anio,libro.pais_origen,libro.editorial, libro.edicion, libro.imagen 
                from ((libro
                inner join libro_autor on libro.isbn = libro_autor.isbn)
                inner join autor on autor.id_autor = libro_autor.num_autor)
                group by libro_autor.isbn");

                if(mysqli_num_rows($result) == 0){
                    echo"
                    <div style='font-size: 20px; text-align: center; padding: 100px'>
                            <img src='../IMG/lentes.png' title ='No disponible'> Por el momento no hay libros disponibles
                    </div>
                    ";
                }
                else{
                    echo "<script>window.location = 'biblioteca_admin.php'</script>";
                }    
                
            ?>

        <?php
            }
            else{
                echo "<script>
                alert('El libro ya existe');
                window.history.go(-1);
                </script>";   
                
            }  
        ?>
    
    </body>

    
</html>