<?php
ob_start();//turns on output buffering
session_start();
$timezone=date_default_timezone_set("Africa/Addis_Ababa");
$con=mysqli_connect("localhost","root","","restorant");
if (mysqli_connect_errno()){
  echo "faild to connect:".mysqli_connect_errno();
}
?>