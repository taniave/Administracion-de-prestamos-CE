<?php
  	include("seguridad.php");
	include("conex.php");

	$link=conectarse();
	$tmp = $_GET['isbn'];

	$query = mysqli_query($link,"select prestamo.num_prestamo,concat_WS(' ',estudiante.nombre,estudiante.ap_pat) as nombre_alumno,prestamo.fecha_prestamo, libro.nombre_libro, autor.nombre_autor,libro.imagen
								from (((((estudiante
								inner join prestamo on estudiante.id = prestamo.id_alumno)
								inner join prestamo_libro on prestamo.num_prestamo = prestamo_libro.num_prestamo)
								inner join libro on prestamo_libro.isbn = libro.isbn)
								inner join libro_autor on libro.isbn = libro_autor.isbn)
								inner join autor on autor.id_autor = libro_autor.num_autor)
								where prestamo_libro.estado = 'En prestamo' and libro.isbn='$tmp'
								order by prestamo.num_prestamo desc");
	if(mysqli_num_rows($query) >= 1){
		echo"<script>
				alert('No es posible eliminar el libro debido a que se encuentra en prestamo');
				window.history.go(-1);
			</script>";
	}else{
		$update=mysqli_query($link,"update libro set estado = 'Eliminado' where libro.isbn = '$tmp'");
		echo"<script>
				alert('Libro eliminado');
				window.location = 'editar.php'
			</script>";
		
	}

	

?>

	