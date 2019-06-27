<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
//$tipo=$_POST['tipo'];
$tipo='A';
session_start();
$_SESSION['usuario']=$usuario;
$conexion=mysqli_connect("localhost","root","","tecnomina");
$consulta="select * from usuario WHERE  dni='76202977' AND clave='1998' AND estado='A'";//seleccion que debe ser verdadera 

$resultado=mysqli_query($conexion,$consulta);//ejecuta
$fila=mysqli_num_rows($resultado);

if ($fila > 0 ) {  //si consigue un dato
	if ($tipo == "A") {
		# code...
		header("location:usu_administrador.php");
	}elseif ($tipo =="P") {
		# code...
		header("location:usu_general.php");
	}
	
	# code...
}else{
	echo "Los datos no coinciden con ninguna cuenta o falta completar ";
}

?>