<?php
    include("seguridad.php"); 
    include("conex.php");

    $link=conectarse();

    
    $isbn = $_GET['isbn'];
    $num_pres=$_GET['num_prestamo'];

    $id_al = $_GET['id_alumno'];
    
    $fecha_pres = $_GET['fecha_pres'];
    $fecha_dev = $_GET['fecha_dev'];
    $año = date("Y",strtotime($fecha_dev));
    $curr = date("Y",strtotime(date("Y-m-d")));
    

    if($fecha_pres > $fecha_dev){
       echo" <script>
            alert('La fecha de prestamo no puede ser menor a la fecha de devolucion');
            window.history.go(-1);
        </script>";
        
    }
    else if($año > $curr){
        echo" <script>
            alert('La devolucion del libro no puede realizarse en el futuro');
            window.history.go(-1);
        </script>";
    }
    else{
        $update = "insert into devolucion(num_prestamo,id_alumno,fecha_prestamo) values ('$num_pres','$id_al','$fecha_pres')";
        $update2 = "insert into devolucion_libro(num_prestamo,isbn,fecha_devolucion) values ('$num_pres','$isbn','$fecha_dev')";
        
        if(!mysqli_query($link,$update) || !mysqli_query($link,$update2)){
            echo"
                <div style='font-size: 20px; text-align: center; padding: 100px'>
                        <img src='../IMG/error.png' title ='Error'> No se puede editar el elemento
                </div>
            ";
            exit();
        }
        
        else{
            $actualizar = "update prestamo_libro set estado = 'Devuelto' where num_prestamo = '$num_pres' and isbn='$isbn'";
            mysqli_query($link,$actualizar) or die(mysqli_error($link));
            $actualizar2 = "update libro set estado = 'Disponible' where isbn = '$isbn'";
            mysqli_query($link,$actualizar2) or die(mysqli_error($link));
            echo "<script>
            alert('Registros actualizados correctamente');
            window.location='devolucion.php';
            </script>";
        }
    }

    
?>