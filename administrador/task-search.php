<?php

include('../database.php');

$search = $_POST['search'];
if(!empty($search)) {
  $query = "select * from personal where dni LIKE '$search%'";
  $result = mysqli_query($conexion, $query);
  
  if(!$result) {
    die('Query Error' . mysqli_error($conexion));
  }
  
  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'dni' => $row['dni'],
      'paterno' => $row['paterno'],
      'materno' => $row['materno'],
      'nombre' => $row['nombre']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
}
?>
