<?php
include('../database.php');
if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $query = "DELETE FROM companiasdeenvios WHERE idCompaniaEnvios = $id"; 
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed.');
  }
  echo "categorias Deleted Successfully";  
}
?>
