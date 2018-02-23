<?php
session_start();
include "dbFunctions.php";
$employId = $_POST['employId'];
$isCheck = $_POST['isCheck'];
// echo json_encode($employId." ".$isCheck);
// if(!isset($_SESSION['isCheck'])){
if($isCheck == '0'){
  $_SESSION['id'] = '1';
  $updateCheckin = "UPDATE `userinfo` SET `isCheck`= '1' WHERE `employee_id` = '$employId'";
  $status = mysqli_query($link, $updateCheckin) or die(mysqli_error($link));
  mysqli_close($link);
  $row["status"] = "Check in successfully!";
  $row["isCheck"] = $isCheck;
  echo json_encode($row);
}else{
  $row["status"] = "You have already check in to system!";
  $row["isCheck"] = $isCheck;
  echo json_encode($row);
}


?>
