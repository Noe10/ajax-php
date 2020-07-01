<?php
include('../database.php');
if(isset($_POST['id'])) {
   $id =  $_POST['id'];
  $query = "SELECT * from companiasdeenvios WHERE idCompaniaEnvios = $id";

  $result = mysqli_query($connection, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'nombreCompania' => $row['nombreCompania'],
      'telefono' => $row['telefono'],
      'idCompaniaEnvios' => $row['idCompaniaEnvios']
    );
  }
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;
}
?>
