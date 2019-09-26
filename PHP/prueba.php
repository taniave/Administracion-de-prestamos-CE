<!--html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
            $('[data-toggle="popover"]').popover(); 
            });
        </script>
</head>
<body>
    <input type="text" placeholder="Título" name="title" id="title" data-toggle="popover" data-placement="top" title="Alerta" data-content="Si el libro posee varios autores, separarlos con comas" required>
</body>
</html-->




<!--?php
    include("conex.php");
    $link=conectarse();

    /*$tit = $_POST['title'];
    $anio = $_POST['year'];
    $autor = $_POST['autor'];
    $isbn = $_POST['isbn'];
    $pais = $_POST['pais'];
    $copias = $_POST['copias'];
    $edit = $_POST['edit'];
    $edi = $_POST['ed'];

   $aut = explode(',',$autor);
   $num = count($aut);
   echo $num."<br>";
   for($i=0;$i<count($aut);$i++){
       echo $aut[$i]."<br>";
   }*/

    /*
    for($i=1; $i<=$copias; $i++){
        $temp = $isbn.'-'.$i;

        echo"isbn = ".$temp."<br>";
        echo "titulo = ".$tit."<br>";
        echo "año = ".$anio."<br>";
        echo "autor = ".$autor."<br>";
        echo "pais = ".$pais."<br>";
        echo "editorial = ".$edit."<br>";
        echo "edicion = ".$edi."<br>";
    }*/
      /*  $validar = mysqli_query($link,"select prestamo.num_prestamo,concat_WS(' ',estudiante.nombre,estudiante.ap_pat) as nombre_alumno,prestamo.fecha_prestamo, libro.nombre_libro, autor.nombre_autor,libro.estado,prestamo_libro.estado
        from (((((estudiante
        inner join prestamo on estudiante.id = prestamo.id_alumno)
        inner join prestamo_libro on prestamo.num_prestamo = prestamo_libro.num_prestamo)
        inner join libro on prestamo_libro.isbn = libro.isbn)
        inner join libro_autor on libro.isbn = libro_autor.isbn)
        inner join autor on autor.id_autor = libro_autor.num_autor)
        where prestamo_libro.estado = 'En prestamo' and libro.nombre_libro like 'la hoguera de bronce' and libro.estado = 'Disponible'");
    if(mysqli_num_rows($validar) == 0){
        echo"<script>
				alert('libro  disponible');
				window.history.go(-1);	
			</script>";          
    }else{
        echo"<script>
        alert('libro no disponible');
        window.history.go(-1);
        </script>";
    }*/
    $validar = mysqli_query($link,"select * from estudiante");
    echo"<table>";
    echo"<tr><td>id</td><td>nombre</td><td>apellido</td><td>Correo</td></tr>";
    while($row=mysqli_fetch_array($validar)){
        echo"<tr><td>".$row['id']."</td><td>".$row['nombre']."</td><td>".$row['ap_pat']."</td><td>".$row['correo']."</td></tr>"; 
        
    }
    echo"</table>";

?-->

<?php
$fecha_dev = $_GET['fecha_dev'];
$fecha_pres = $_GET['fecha_pres'];

echo $fecha_dev."<br>";
echo $fecha_pres."<br>";

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
        echo" <script>
            alert('Exito');
        </script>";
    }


?>