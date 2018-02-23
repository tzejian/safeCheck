<?php
session_start();
include "dbFunctions.php";

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "DELETE FROM `userinfo` WHERE id = '$id'";
  $status = mysqli_query($link, $query) or die(mysqli_error($link));
  mysqli_close($link);
  $row["status"] = "Delete successfully!";
  echo json_encode($row);
} else {
  $row["status"] = "Delete fail, try again!";
  echo json_encode($row);
}


?>
