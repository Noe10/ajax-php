<?php

include('../database.php');

$search = $_POST['search'];
if(!empty($search)) {
  $query = "SELECT * FROM categorias WHERE nombrecategoria LIKE '$search%'";
  $result = mysqli_query($connection, $query);
  
  if(!$result) {
    die('Query Error' . mysqli_error($connection));
  }
  
  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'nombrecategoria' => $row['nombrecategoria'],
      'descripcion' => $row['descripcion'],
      'idcategoria' => $row['idcategoria']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
}

?>
