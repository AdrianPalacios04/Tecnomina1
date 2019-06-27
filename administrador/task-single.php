<?php
  include('../database.php');

  $query = "select p.dni,p.paterno,p.materno,p.nombre,a.tipo,a.numero from personal p inner join agenda a where a.dni = p.dni";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($conexion));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'dni' => $row['dni'],
      'paterno' => $row['paterno'],
      'materno' => $row['materno'],
      'nombre' => $row['nombre'],
      'tipo' => $row['tipo'],
      'numero' => $row['numero']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>

