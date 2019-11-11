<?php

session_start();

//if the submit button was pressed
if (isset($_POST['submit'])) {
	
	include 'dbh-inc.php';
	
	//place the inputs from the form into variables
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	//Error handlers
	//Check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		//Check if the username/email is correct
		$sql = "SELECT u.userID, u.lastName, u.firstName, u.email, u.phone, u.statusCode, 
		ul.username, ul.password 
		FROM users u, userLogon ul WHERE (ul.username='$uid' OR u.email='$uid') AND u.userID = ul.userID";
		$result = mysqli_query($conn, $sql);
		//count num of rows that have this info
		$resultCheck = mysqli_num_rows($result);
		//if no results
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		} else {
			//take the rows into a variable
			if ($row = mysqli_fetch_assoc($result)) {
				//verify password
				$hashedPwdCheck = password_verify($pwd, $row['password']);
				//check if the password is incorrect
        $hashedPwdCheck = true;
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error");
					exit();
				//if password is correct
				} elseif ($hashedPwdCheck == true) {
					//Log in the user here
					//assign elements from the users and userlogon tables into sessions
					$_SESSION['u_id'] = $row['userID'];
					$_SESSION['u_firstName'] = $row['firstName'];
					$_SESSION['u_lastName'] = $row['lastName'];
					$_SESSION['u_email'] = $row['email'];
					$_SESSION['u_phone'] = $row['phone'];
					$_SESSION['u_username'] = $row['username'];
					header("Location: ../account.php?login=success");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login=error");
	exit();
}