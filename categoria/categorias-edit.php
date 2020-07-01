<?php

include('../database.php');

if(isset($_POST['id'])) {
  $categorias_name = $_POST['name']; 
  $categorias_description = $_POST['description'];
  $id = $_POST['id'];
  echo $id;
  $query = "UPDATE categorias SET nombrecategoria = '$categorias_name', descripcion = '$categorias_description' WHERE idcategoria = '$id'";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed.');
  }
  echo "categorias Update Successfully";  

}

?>
