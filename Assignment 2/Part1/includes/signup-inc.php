<?php

//if the submit button has been pressed
if (isset($_POST['submit'])) {
	
	//include the php program here
	include_once 'dbh-inc.php';
	
	//take the inputs from the form and place them into variables
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	
	//Error handlers
	//Check for empty fields
	if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($uid) || empty($pwd)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=erroremail");
				exit();
			} else {
				//select the correct row from the users and userlogon tables
				$sql = "SELECT * FROM userLogon ul, users u 
				WHERE ul.username='$uid' OR u.email='$email'";
				//query the database
				$result = mysqli_query($conn, $sql);
				//count number of rows that equal this result
				$resultCheck = mysqli_num_rows($result);
				//check if the rows exist
				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=usertaken");
					exit();
				} else {
					//hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
          //users table
					$sqlUser = "INSERT INTO users (lastName, firstName, email, phone) 
          VALUES ('$lastName', '$firstName', '$email', '$phone');";
          //userLogon table
					$sqlUserLogon = "INSERT INTO userLogon (username, password) 
					VALUES ('$uid', '$hashedPwd');";
					$sqlUserID = "UPDATE userLogon SET userID = (SELECT userID FROM users 
					WHERE email='$email') WHERE username='$uid'";
          
					mysqli_query($conn, $sqlUser);
					mysqli_query($conn, $sqlUserLogon);
					mysqli_query($conn, $sqlUserID);
					header("Location: ../signup.php?signup=success");
					exit();
					
				}
			}
		}
	}
	
} else {
	header("Location: ../signup.php");
	exit();
}
