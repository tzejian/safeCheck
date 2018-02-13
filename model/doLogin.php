<?php
session_start();
include "dbFunctions.php";
$msg = "";
//login check
if(!isset($_SESSION['id'])){
  if(isset($_POST["employeeID"])){
    $loginId = $_POST["employeeID"];
  }
  $query = "SELECT * FROM `userinfo` WHERE `employee_id` = '$loginId'";
  $result = mysqli_query($link, $query)or die(mysqli_error($link));
  //print_r ($result);
  if (mysqli_num_rows($result) > 0) {         //check for matching records
      $row = mysqli_fetch_array($result);
      $_SESSION['id'] = $row['id'];
      $_SESSION['employee_id'] = $row['employee_id'];
      $_SESSION['department'] = $row['department'];
      $_SESSION['isCheck'] = $row['isCheck'];
      $msg = "Success";
      echo $msg;
      //print_r ($_SESSION);
    header("Location: userCheckin.php");
  }else{
    $msg = "Invalid Login";
    echo $msg;
  }
}else{
  $msg = "You have already logged in";
  echo $msg;
}

?>
