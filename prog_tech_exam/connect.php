<?php
//connection variables
$servername = "localhost";
$username = "root";
$password = "root";
$dbName = "explorecalifornia";

$connect = new mysqli($servername, $username, $password, $dbName);

if ($connect -> connect_error){
    die("Connection failed..." + $connect->connect_error);
} else {
    //echo "Connection successful";
}
?>