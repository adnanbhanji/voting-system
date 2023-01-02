<?php

include_once 'dbcon.php';
session_start();
$output = null;


//check form
if (isset($_POST['submit'])) {
	$email = $_POST["email"];
	$password = $_POST["password"];

	if (empty($email) or (empty($password))) {
		$output = "Please fill in all the fields";
	}

	else {
		$email = $link->real_escape_string("$email");
		$password = $link->real_escape_string("$password");

		$query = $link->query("SELECT id FROM studentdata WHERE email= '$email' and password= md5('$password')");

		if ($query->num_rows == 0) {
			$output = "Invalid Email or password";
		}

		else {
			// user logs in successfully
			header('location:electionchoice.php');
			$_SESSION['user'] = $email;

			$output = " Welcome " . $_SESSION['user'] . "- <a href= 'signout.php'> Sign Out </a>"; 
		}
	}
}

if (!isset($_SESSION['user'])) {
	//Display welcome guest and login form
	echo "Welcome Guest";

?>
<br>

<!DOCTYPE html>
<html>
<head>
	<title>Student Sign in</title>
	<link rel="stylesheet" type="text/css" href="forms.css">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1>Boboto College Student Sign in</h1>

<form method="post">


 
Email: <br> <input type="text" name="email"> <br> <br>
Password: <br> <input type="password" name="password"> <br> <br> 
<input type="submit" name="submit" value="Sign in"> <br> <br>
</form>


<?php
}

else {
	//display welcome *user* and the logout button too

}

echo $output;

