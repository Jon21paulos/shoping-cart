<?php
	require_once 'db/conn.php';
	
	if(ISSET($_POST['submit'])){
		
		// if($_FILES['photo']['name']['code']['price']['madein'] != "" && $_POST['name'] != "" ){
			$username = $_POST['username'];
			$name = $_POST['name'];
			$code = $_POST['code'];
			$price = $_POST['price'];
			$madein = $_POST['madein']; 
			$image_name = $_FILES['photo']['name'];
			$image_temp = $_FILES['photo']['tmp_name'];
			$extension = explode('.', $image_name);
			$image = time().".".end($extension);
			move_uploaded_file($image_temp, "../userproduct/".$image);
			$conn->query("INSERT INTO `userproduct` VALUES('id','username', '$name', '$code', '$image', '$price', '$madein')") or die(mysqli_errno());
			header('location:Accessesoris.php');
		// }
	}
?>