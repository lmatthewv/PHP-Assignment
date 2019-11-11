<?php

//if the user pressed the sign out button
if (isset($_POST['submit'])) {
	//sign out the user
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../index.php");
	exit();
}