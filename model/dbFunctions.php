<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "rogerproject";
$link = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$link) {
    die(mysqli_error($link));
    // alternative way to display the error:
    // die(mysqli_connect_error());
    //echo "Failed to connect to MySQL: " . MySQLi_connect_error();
}
?>
