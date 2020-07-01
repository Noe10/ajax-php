<?php
include('../database.php');
$search = $_POST['search'];
if(!empty($search)) {
  $query = "SELECT * FROM companiasdeenvios WHERE nombreCompania LIKE '$search%'";
  $result = mysqli_query($connection, $query);
  if(!$result) {
    die('Query Error' . mysqli_error($connection));
  }
  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'nombreCompania' => $row['nombreCompania'],
      'telefono' => $row['telefono'],
      'idCompaniaEnvios' => $row['idCompaniaEnvios']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
}
?>
