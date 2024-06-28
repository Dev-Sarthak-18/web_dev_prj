<?php
$server = "localhost";
$User = "root";
$pass = "";
$DBname = "signup_login";
$conn = mysqli_connect($server,$User,$pass,$DBname);
if(!$conn){
    die("Something went Wrong");
}
?>