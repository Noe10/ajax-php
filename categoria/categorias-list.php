<?php

  include('../database.php');

  $query = "SELECT * from categorias";
  $result = mysqli_query($connection, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($connection));
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
?>
