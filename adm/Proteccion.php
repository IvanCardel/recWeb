<?php
	if(!isset($_SESSION))
		session_start();
	if(!($_SESSION['permiso']=="si")){
		header("location:../");
		die();
	}		
?>