<?php
session_start();
include "dbFunctions.php";
$employeeid = $_POST['empId'];       //this will get the user input value.
$cfmEmployeeid = $_POST['cfmId'];
//$option = $_POST['selection'];        //this will get the value $i from register.   //for future use

//check if employeeid matches
if($employeeid == $cfmEmployeeid){
  $valid = 1;  //return true
}else{
  $valid = 0;  //return false
}


if($valid == 1){
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
    $query = "INSERT INTO `userinfo`(`employee_id`) VALUES ('$employeeid')";
    $status = mysqli_query($link, $query) or die(mysqli_error($link));

    echo json_encode ($row);
  }
}else{
  $row["message"] = "pls match employee id";
  echo json_encode ($row);
}



mysqli_close($link);

//, `department`     , (SELECT `department` FROM `department`WHERE `department_id` = $option)  sql for future use


?>
