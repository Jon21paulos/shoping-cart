<?php
	session_start();
	session_destroy();
	// session_unset($_SESSION['user']);
	header('location: ../index.php');
?>