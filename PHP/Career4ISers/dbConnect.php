
<?php
$servername = "localhost";
$username = "root";
$passward = "";
$database = "C4IS";

$conn = mysqli_connect($servername,$username,$passward,$database);

if (!$conn) {
  die("db connection failed: ".mysqli_connect_error());
}
