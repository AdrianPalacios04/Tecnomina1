<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$tipo=$_POST['tipo'];
session_start();
$_SESSION['usuario']=$usuario;
$conexion=mysqli_connect("localhost","root","","pruebaS8");
//$consulta="select * from usuario where  usuario='$usuario' and clave='$clave' and tipo='$tipo'  ";//seleccion que debe ser verdadera 
$consulta="SELECT * FROM usuario WHERE  dni='$usuario' AND clave='$clave'  ";

$resultado=mysqli_query($conexion,$consulta);//ejecuta
$fila=mysqli_num_rows($resultado);
if ($fila > 0 ) {  //si consigue un dato
	if ($tipo == "administrador") {
		# code...
		header("location:usu_administrador.php");
	}elseif ($tipo =="general") {
		# code...
		header("location:usu_general.php");
	}
	
	# code...
}else{
	echo "Los datos no coinciden con ninguna cuenta o falta completar ";
}

?>