<?php
session_start();
include "dbFunctions.php";
$employeeid = $_POST['empId'];       //this will get the user input value.
$cfmEmployeeid = $_POST['cfmId'];
//check if employeeid matches
// if ($employeeid == $cfmEmployeeid){
//
// }
$option = $_POST['selection'];        //this will get the value $i from register.
// $data = $employeeid." ".$cfmEmployeeid." ".$option;
// echo json_encode ($data);
$checkId = "SELECT `employee_id` FROM `userinfo` WHERE `employee_id` = '$employeeid'";
$result = mysqli_query($link, $checkId) or die(mysqli_error($link));
if (mysqli_num_rows($result) > 0) {
  $row["status"] = mysqli_fetch_array($result);
  $row["message"] = "matched";
  echo json_encode ($row);
}else{
  $row["status"] = mysqli_fetch_array($result);
  $row["message"] = "unmatched";
  //insert data into database
  $query = "INSERT INTO `userInfo`(`employee_id`, `department`) VALUES ('$employeeid', (SELECT `department` FROM `department`WHERE `department_id` = $option))";
  $status = mysqli_query($link, $query) or die(mysqli_error($link));
  // if($status){
  //     $row1["status"] = $status;
  //     $row1["message"] = "Contact record is updated successfully.";
  //     echo json_encode($row1);
  // }else{
  //     $row1["status"] = $status;
  //     $row1["message"] = "Update unsuccessful.";
  //     echo json_encode($row1);
  // }
  echo json_encode ($row);
}


mysqli_close($link);




?>
