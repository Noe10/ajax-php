<?php

  include('../database.php');
  $idQuery = "SELECT count(idcategoria) FROM categorias";
  $idresult = mysqli_query($connection, $idQuery);
 
  if (!$idresult) {
    die('Query Failed.');
  }
  
  $data = $idresult->fetch_row();
  
  $id =  $data[0] + 1 ;


  echo $id;
  
if(isset($_POST['name']) && $id) {
   echo $_POST['name'] . ', ' . $_POST['description'];
   echo $id;
  
  $categorias_name = $_POST['name'];
  $categorias_description = $_POST['description'];

  $query = "INSERT into categorias(idcategoria, nombrecategoria , descripcion) VALUES ($id,'$categorias_name', '$categorias_description')";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed.');
  }

  echo "categorias Added Successfully";  

}

?>
