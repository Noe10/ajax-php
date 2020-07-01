<?php

  include('../database.php');
  $idQuery = "SELECT count(idCompaniaEnvios) FROM companiasdeenvios";
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
  
  $comEnvio_name = $_POST['name'];
  $comEnvio_telefono = $_POST['description'];

  $query = "INSERT into companiasdeenvios(idCompaniaEnvios, nombreCompania , telefono) VALUES ($id,'$comEnvio_name', '$comEnvio_telefono')";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed.');
  }

  echo "compania Added Successfully";  

}

?>
