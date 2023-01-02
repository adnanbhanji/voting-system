<?php

session_start();
session_destroy();

?>






<br>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Out</title>
	<link rel="stylesheet" type="text/css" href="forms.css">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1><?php echo "You have been logged out";?></h1>

<button class="button6"><a class="whitetext" href= 'index.php'> Quit </a></button>
