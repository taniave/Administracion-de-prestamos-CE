<?php
include("conex.php");

$link=conectarse();


$tit = $_GET['title'];
$anio = $_GET['year'];
$pais = $_GET['pais'];
$edit = $_GET['edit'];
$edi = $_GET['ed'];
$autor = $_GET['autor'];
$tmp_a = $_GET['autor_temp'];
$isbn = $_GET['isbn'];
$isbn_tmp = $_GET['isbn_temp'];

$aut = explode(',',$autor);
$temp = explode(',',$tmp_a);

$update = "update libro set isbn ='$isbn_tmp',nombre_libro = '$tit',editorial = '$edit',edicion='$edi',anio='$anio',pais_origen='$pais' where isbn = '$isbn'";

if(count($aut)>1){
    for($i=0;$i<count($aut);$i++){
        $q = mysqli_query($link,"select id_autor from autor where nombre_autor = '$aut[$i]'");
        $row=mysqli_fetch_array($q);
        $update2 = "update autor set nombre_autor = '$temp[$i]' where id_autor = '$row[0]'"; 
    }
}
else{
    $q = mysqli_query($link,"select id_autor from autor where nombre_autor = '$autor'");
    $row=mysqli_fetch_array($q);
    $update2 = "update autor set nombre_autor = '$tmp_a' where id_autor = '$row[0]'"; 
}



if(!mysqli_query($link,$update) || !mysqli_query($link,$update2)){
    echo"
        <div style='font-size: 20px; text-align: center; padding: 100px'>
                <img src='../IMG/error.png' title ='Error'> No se puede editar el elemento
        </div>
    ";
    exit();
}

else{
    echo "<script>
    alert('Registros actualizados correctamente');
    window.location='biblioteca_admin.php';
    </script>";
}

//echo" query ".$row[0];

/*
    echo "original autor ".$autor."<br>";
    echo "auxiliar autor ".$tmp_a."<br>";
    echo "original isbn ".$isbn."<br>";
    echo "auxiliar isbn".$tmp."<br>";
*/
?>