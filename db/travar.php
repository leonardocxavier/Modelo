<?php 
    header("X-XSS-Protection: 1; mode=block");
	error_reporting(0);
	if(session_status() == PHP_SESSION_NONE){
        session_start();
    } 
	if(!isset($_SESSION["txt_senha"]) and !isset($_SESSION["loginuser"])){ 
		echo "<script type= 'text/javascript'> location.href = '../' </script>";
	}
?>
