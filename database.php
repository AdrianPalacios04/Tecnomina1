<?php

$conexion = mysqli_connect(
  'localhost', 'root', '', 'tecnomina'
);

// for testing connection
#if($connection) {
#  echo 'database is connected';
#}
?>