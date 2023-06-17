<?php

$server = "localhost";
$username = "root";
$password = "";


$conn = mysqli_connect($server, $username, $password);

if (!$conn){
    die("error : ".mysqli_connect_error());
}

$sql = "CREATE DATABASE "

?>