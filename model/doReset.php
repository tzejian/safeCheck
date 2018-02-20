<?php
include "dbFunctions.php";
$isCheck = $_POST['isCheck'];

$queryReset = "UPDATE `userinfo` SET `isCheck`= '$isCheck'";
$status = mysqli_query($link, $queryReset)or die(mysqli_error($link));

if($status){
    $row["status"] = $status;
    $row["message"] = "updated successfully.";
    echo json_encode($row);
}else{
    $row["status"] = $status;
    $row["message"] = "Update unsuccessful.";
    echo json_encode($row);
}
mysqli_close($link);
?>
