<?php
	require_once 'db/conn.php';
	
	if(ISSET($_POST['submit'])){
		
		// if($_FILES['photo']['name']['code']['price']['madein'] != "" && $_POST['name'] != "" ){
			$name = $_POST['name'];
			$code = $_POST['code'];
			$price = $_POST['price'];
			$madein = $_POST['madein']; 
			$image_name = $_FILES['photo']['name'];
			$image_temp = $_FILES['photo']['tmp_name'];
			$extension = explode('.', $image_name);
			$image = time().".".end($extension);
			move_uploaded_file($image_temp, "../accessesoris/product/".$image);
			$conn->query("INSERT INTO `accessesoris` VALUES('id', '$name', '$code', '$image', '$price', '$madein')") or die(mysqli_errno());
			header('location:accessesoris.php');
		// }
	}
?>