<?php 

include('../db/config.php');
include('db/session.php');

$get_id=$_GET['user_id'];

$history_record=mysqli_query($conn,"select * from productmen where id=$get_id");
$row=mysqli_fetch_array($history_record);
$user=$row['name']." ".$row['price'];
mysqli_query($conn,"INSERT INTO history (date,action,data) VALUES (NOW(),'Delete User','$user')")or die(mysqli_error());

mysqli_query($conn,"delete from productmen where id = '$get_id' ")or die(mysqli_error());

header('location:mensproduct.php');
?>