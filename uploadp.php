<?php
session_start();
	require_once 'db/config.php';
// var_dump($_SESSION);
	 $id =$_SESSION['id'];

	
	if(ISSET($_POST['submit'])){
		
		if($_FILES['photo'] != ""){ 
			$image_name = $_FILES['photo']['name'];
			$image_temp = $_FILES['photo']['tmp_name'];
			$extension = explode('.', $image_name);
			$image = time().".".end($extension);
			move_uploaded_file($image_temp, "profile/".$image);
			$profile = $image;
			$update = $conn->query(" UPDATE member SET  profile='$profile' WHERE mem_id='$id'") or die(mysqli_error($conn));
			if($update)
			header('location:'.$_SERVER['HTTP_REFERER']);
		}
	}
?>