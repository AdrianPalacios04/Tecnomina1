<?php

  include('../database.php');

  # echo $_POST['name'] . ', ' . $_POST['description'];
  $task_dni = $_POST['dni'];
  $task_paterno = $_POST['paterno'];
  $task_materno = $_POST['materno'];
  $task_nombre = $_POST['nombre'];
  $query = "insert into personal(dni,paterno,materno,nombre) values ('$task_dni', '$task_paterno','$task_materno', '$task_nombre')";
  $result = mysqli_query($conexion, $query);

  if (!$result) {
    die('Query Failed.');
  }

  echo "Task Added Successfully";  

?>
