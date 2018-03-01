<?php
session_start();
include "dbFunctions.php";
$msg = "";
//login check
//if(!isset($_SESSION['id'])){
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
      $_SESSION['role'] = $row['role'];
      $_SESSION['department'] = $row['department'];
      $_SESSION['isCheck'] = $row['isCheck'];
      $msg = "Success";
      //echo $msg;
      if($_SESSION['role'] == 0){
        //user account
        //do user checkin logic
        date_default_timezone_set("Asia/Singapore");
        $updateCheckin = "UPDATE `userinfo` SET `isCheck`= '1' WHERE `employee_id` = '$loginId'";
        $status = mysqli_query($link, $updateCheckin) or die(mysqli_error($link));
        header("Location: ../checkIn.php");
      }else{
        //admin account
        header("Location: ../adminOnly.php");
      }
    //header("Location: ../userCheckin.php");
  }else{
    header("Location: ../invalidLogin.php");
  }
//}else{
  // $msg = "You have already logged in";
  // echo $msg;
//  if($_SESSION['role'] == 0){
 //   header("Location: ../checkIn.php");
 // }else{
//    header("Location: ../adminOnly.php");
 // }
//}
mysqli_close($link);

?>
