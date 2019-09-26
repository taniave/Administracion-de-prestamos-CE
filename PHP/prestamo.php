
<?php  include("seguridad.php"); ?>            
        <?php
            include("conex.php");
            $link=conectarse();

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            $id_al = $_POST['id_alumno'];
            $nom = $_POST['name_st'];
            $pat = $_POST['ap_pat'];
            $correo = $_POST['correo'];
            $titulo = $_POST['title_pres'];
            $f_prestamo = $_POST['fecha'];
            
            

            $temp = mysqli_fetch_array(mysqli_query($link, "select isbn from libro where nombre_libro = '$titulo' and estado = 'Disponible' limit 1")); //buscar isbn de acuerdo al titulo del libro

            $validar = mysqli_query($link,"select prestamo.num_prestamo,concat_WS(' ',estudiante.nombre,estudiante.ap_pat) as nombre_alumno,prestamo.fecha_prestamo, libro.nombre_libro, autor.nombre_autor,libro.estado,prestamo_libro.estado
            from (((((estudiante
            inner join prestamo on estudiante.id = prestamo.id_alumno)
            inner join prestamo_libro on prestamo.num_prestamo = prestamo_libro.num_prestamo)
            inner join libro on prestamo_libro.isbn = libro.isbn)
            inner join libro_autor on libro.isbn = libro_autor.isbn)
            inner join autor on autor.id_autor = libro_autor.num_autor)
            where prestamo_libro.estado = 'En prestamo' and libro.isbn like '$temp[0]%' and libro.estado = 'No Disponible'");

            if(mysqli_num_rows($validar) == 0){
                $query = "select * from estudiante where id = '$id_al'";
                $res = mysqli_query($link,$query);

                if(mysqli_num_rows($res) == 0){
                    $insert = "insert into estudiante (id,nombre,ap_pat,correo) values('$id_al','$nom','$pat','$correo')";
                    mysqli_query($link,$insert) or die(mysqli_error($link));
                }
                //insertar prestamo de un alumno
                mysqli_query($link,"insert into prestamo(id_alumno,fecha_prestamo) values ('$id_al','$f_prestamo')") or die(mysqli_error($link));
                
                $id = mysqli_fetch_array(mysqli_query($link, "select max(num_prestamo) from prestamo"));

                $prestamo = "insert into prestamo_libro(num_prestamo,isbn,estado) values('$id[0]','$temp[0]','En prestamo')";

                mysqli_query($link,$prestamo) or die(mysqli_error($link));
                $update=mysqli_query($link,"update libro set estado = 'No disponible' where libro.isbn = '$temp[0]'");
                
                $aux = "select prestamo.num_prestamo, estudiante.nombre,estudiante.ap_pat,estudiante.correo, prestamo.fecha_prestamo,libro.isbn,libro.nombre_libro, autor.nombre_autor,libro.editorial, libro.imagen
                from (((((estudiante
                inner join prestamo on estudiante.id = prestamo.id_alumno)
                inner join prestamo_libro on prestamo.num_prestamo = prestamo_libro.num_prestamo)
                inner join libro on prestamo_libro.isbn = libro.isbn)
                inner join libro_autor on libro.isbn = libro_autor.isbn)
                inner join autor on autor.id_autor = libro_autor.num_autor)
                order by prestamo.num_prestamo desc ";

                $result = mysqli_query($link,$aux) or die(mysqli_error($link));

                if(mysqli_num_rows($result) == 0){
                    echo"
                    <div style='font-size: 20px; text-align: center; padding: 100px'>
                            <img src='../IMG/lentes.png' title ='No disponible'> Por el momento no hay libros disponibles
                    </div>
                    ";
                }
                else{
                    echo "<script>
                    window.location = 'devolucion.php'
                    </script>";
                }         
            }
            else{
                echo"<script>
                alert('libro no disponible');
                window.history.go(-1);
                </script>";
            }
        ?>
