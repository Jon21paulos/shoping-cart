<?php
	require_once 'db/conn.php';

	$id =$_GET['mem_id'];

	
	if(ISSET($_POST['submit'])){
		
		if($_FILES['photo'] != ""){ 
			$image_name = $_FILES['photo']['name'];
			$image_temp = $_FILES['photo']['tmp_name'];
			$extension = explode('.', $image_name);
			$image = time().".".end($extension);
			move_uploaded_file($image_temp, "../profile/".$image);
			$conn->query(" UPDATE member SET  photo='$profile' WHERE mem_id='ide'") or die(mysqli_errno());
			header('location:../profile.php');
		}
	}
?>