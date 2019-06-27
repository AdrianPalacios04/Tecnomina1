<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$tipo = 'A';
session_start();
$_SESSION['usuario']=$usuario;
$conexion=mysqli_connect("localhost","root","","tecnomina");
$consulta="select * from usuario where  dni='$usuario' and clave='$clave' and tipo='A' and estado='A'";//seleccion que debe ser verdadera 
$resultado=mysqli_query($conexion,$consulta);//ejecuta 
$fila=mysqli_num_rows($resultado);
if ($fila > 0 ) {  //si consigue un dato
	if ($tipo == "A") {
		# code...
		header("location:administrador/table.php");
	}elseif ($tipo =="general") {
		# code...
		header("location:usu_general.php");
	}
	
	# code...
}else{
	echo "Los datos no coinciden con ninguna cuenta o falta completar ";
}

?>