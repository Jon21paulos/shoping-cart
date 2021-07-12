<?php
	$conn = new mysqli('localhost', 'root', '', 'mkshope');
	
	if(!$conn){
		die("Error: Can't connect to the database!");
	}
?>