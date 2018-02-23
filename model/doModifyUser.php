<?php
include "dbFunctions.php";
if(isset($_POST['isCheck'], $_POST['id'], $_POST['employeeId'])){

  $id = $_POST['id'];
  $isCheck = $_POST['isCheck'];
  $employeeId = $_POST['employeeId'];

  $updateCheckin ="UPDATE `userinfo` SET `employee_id`='$employeeId',`isCheck`=$isCheck WHERE `id` = $id";

  $status = mysqli_query($link, $updateCheckin) or die(mysqli_error($link));
  mysqli_close($link);
}
  header("Location: ../profile.php");

//, $_POST['depList']    $department = $_POST['depList'];   remove for future use
//,`department`='$department'  sql line

?>
