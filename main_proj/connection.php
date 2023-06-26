<?php
$conn = mysqli_connect("localhost", "root", "", "ap_proj");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>