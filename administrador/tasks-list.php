<?php

  include('../database.php');

  $query = "SELECT * from personal";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($conexion));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'paterno' => $row['paterno'],
      'materno' => $row['materno'],
      'nombre' => $row['nombre'],
      'dni' => $row['dni']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>
