<?php
	$conn = new mysqli('localhost', 'root', '', 'mkshope');
	
	if(!$conn){
		die("Error!: Cannot connect to the database!");
	}
?>