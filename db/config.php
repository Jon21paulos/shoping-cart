<?php
$conn = mysqli_connect('localhost','root','','mkshope');

if(!$conn){
	echo "Connection Failed: ". mysqli_error($conn);
}
?>