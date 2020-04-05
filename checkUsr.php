<?php
    $usuario=$_POST['usuario'];
    $pass=$_POST['pass'];
    if(!isset($_SESSION)){
        session_start();
    }
    require_once("conec.php");
	$result=mysqli_query($cn,"SELECT * FROM usuario WHERE usr='$usuario' AND pwd='$pass'");
	$s=$result->num_rows;
	if($s==1){
		$_SESSION['permiso']='si';
		echo"T";
	}
	else{
		echo"F";
	}  
?>