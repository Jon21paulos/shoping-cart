<?php
include('include/database.php');
include('session.php');

$logout_query=mysqli_query($conn,"select * from member where user_id=$id_session");
$row=mysqli_fetch_array($logout_query);
$user=$row['firstname']." ".$row['lastname'];
session_start();
session_destroy();

mysqli_query($conn,"INSERT INTO history (date,action,data)VALUES(NOW(),'Logout','$user')")or die(mysqli_error());

header('location:index.php');

?>