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

//insert data into database
$query = "INSERT INTO `userInfo`(`employee_id`, `department`) VALUES ($employeeid, (SELECT `department` FROM `department`WHERE `department_id` = $option))";
$status = mysqli_query($link, $query) or die(mysqli_error($link));

if($status){
    $row["status"] = $status;
    $row["message"] = "Contact record is updated successfully.";
    echo json_encode($row);
}else{
    $row["status"] = $status;
    $row["message"] = "Update unsuccessful.";
    echo json_encode($row);
}


mysqli_close($link);




?>
