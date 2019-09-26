<?php
	session_start();
	if(!$_SESSION){
		echo "<script>window.location = 'login_admin.php'</script>";
		exit();
	}
?>