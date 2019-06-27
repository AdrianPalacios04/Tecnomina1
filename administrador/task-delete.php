<?php

include('../database.php');

if(isset($_POST['dni'])) {
  $dni = $_POST['dni'];
  $query = "delete from personal where dni = $dni"; 
  $result = mysqli_query($conexion, $query);

  if (!$result) {
    die('Query Failed.');
  }
  echo "Task Deleted Successfully";  
}
?>
