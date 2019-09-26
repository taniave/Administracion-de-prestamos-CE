<?php

	function conectarse(){

		if(!$link=mysqli_connect("localhost","id9179522_admince","admin","id9179522_escritura")){
			die("Error conectado: ".mysqli_connect_error());
			exit();
		}
		return $link;
	}

?>