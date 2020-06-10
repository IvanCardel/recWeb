<?php
// Se atrapan los archivos y  se asignan a una variable de sesión,
// después se comparan en la DB y se regresa un objeto tipo string
// que endado caso de pertenecer a la base de datos, será permiso sí,
// de lo contrario se denegará el acceso.
    $usuario=$_POST['usuario'];
    $pass=$_POST['pass'];
    if(!isset($_SESSION)){
        session_start();
    }
    require_once("conec.php");
	$result=mysqli_query($cn,"SELECT * FROM usuario WHERE usr='$usuario' AND pwd='$pass'");
	while($row=mysqli_fetch_array($result)){
		$_SESSION['usuario']=$row['idUsr'];
	}
	$s=$result->num_rows;
	if($s==1){
		$_SESSION['permiso']='si';
		echo"T";
	}
	else{
		echo"F";
	}  
?>