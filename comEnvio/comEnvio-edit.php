<?php
include('../database.php');
if(isset($_POST['id'])) {
  $comEnvio_name = $_POST['name']; 
  $comEnvio_telefono = $_POST['description'];
  $id = $_POST['id'];
  echo $id;
  $query = "UPDATE companiasdeenvios SET nombreCompania = '$comEnvio_name', telefono = '$comEnvio_telefono' WHERE idCompaniaEnvios = '$id'";
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die('Query Failed.');
  }
  echo "categorias Update Successfully";  
}
?>
