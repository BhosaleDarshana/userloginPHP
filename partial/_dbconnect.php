<?php
//create connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logger";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die ("not connected to server==>".mysqli_connect_error());
}
?>