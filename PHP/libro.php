
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <title>Informacion del Libro</title>
    <meta charset="UTF-8">

        <script> document.createElement("Banner") </script>
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
		
        <style type="text/css">
            .libro{
                border: 0px;
                background: transparent;
				width: 70%;
                -webkit-transition: width 0.10s ease-in-out;
                transition: width 0.10s ease-in-out;
			}
			
        </style>

</head>
<body style="font-family: Roboto Condensed; font-size: 15px;">

<Banner> Biblioteca </Banner>

<?php
    include("nav-bar.php");
    include("conex.php");

    $link=conectarse();
    
    //if(isset($_POST['']))

    $tmp = $_GET['isbn'];
    $result=mysqli_query($link,"select libro.isbn, libro.nombre_libro, group_concat(autor.nombre_autor) as nombre_autor, libro.anio,libro.pais_origen,libro.editorial, libro.edicion, libro.imagen 
    from ((libro
    inner join libro_autor on libro.isbn = libro_autor.isbn)
    inner join autor on autor.id_autor = libro_autor.num_autor)
    where libro.isbn = '$tmp'
    group by libro_autor.isbn");

    $row=mysqli_fetch_array($result);
    
    echo"
    <input type='hidden' name='isbn' id='isbn' maxlength='20' value='$row[0]'/>
    <table align='Center'  width='50%'  cellpadding='5'>

        <tr align='left'>
            <td align='center' rowspan='10' style='padding-top: 15px; padding-bottom: 15px;'>
                <img class='img-thumbnail' src='".$row[7]."' width='248px' height='400px'>
            </td>
        </tr>	
        
        <tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'><b>Autor/es:</b> <input type='text' name='autor' value='$row[2]' id='autor' class='libro' readonly> <br></td></tr>
        <tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'><b>Título del libro:</b> <input type='text' name='title' value='$row[1]' id='title'  class='libro' readonly><br></td></tr>
        <tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'><b>Edicion:</b> <input type='text' name='ed' value='$row[6]' id='ed' class='libro' readonly><br></td></tr>
        <tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'><b>Editorial:</b> <input type='text' name='edit' value='$row[5]' id='edit' class='libro' readonly><br></td></tr>
        <tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'><b>Año de publicacion:</b> <input type='year' name='year' value='$row[3]' maxlength='4' id='year' class='libro' readonly><br></td></tr>
        <tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'><b>Pais de origen:</b> <input type='text' name='pais' value='$row[4]' id='pais' class='libro' readonly><br></td></tr>
        <tr align='left'><td style='padding-top: 10px; padding-bottom: 10px;'><b>ISBN:</b> <input type='text' name='isbn' id='isbn' maxlength='20' value='$row[0]' class='libro' readonly><br></td></tr>
    
        <tr>
				<td colspan='7'><a href='biblioteca.php'><img src='../IMG/back.png'>Volver</a></td>
		</tr>
        
    </table>";

?>

</body>
</html>
    
                        
