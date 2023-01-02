<?php
include_once 'dbcon.php';
$output = null;

if(isset($_POST['submit'])) {

	$name = $link->real_escape_string($_POST["name"]);
	$collegeyear = $link->real_escape_string($_POST["cyear"]);
	$collegehouse = $link->real_escape_string($_POST["house"]);
	$collegeidnum = $link->real_escape_string($_POST["idnumber"]);
	$email = $link->real_escape_string($_POST["email"]);
	$password= $link->real_escape_string($_POST["pwd"]);
	$repeatpassword= $link->real_escape_string($_POST["repeatpwd"]);

	$query = $link->query("SELECT * FROM studentdata WHERE email = '$email' ");

	if(empty($name) or empty($collegeyear) or empty($collegehouse) or empty($collegeidnum) or empty($email) or empty($password) or empty($repeatpassword)) {

		$output = "Please fill in all the fields!";
	}

	elseif($query->num_rows != 0) {
		$output = "That email has already been registered!";
	}

	elseif ($repeatpassword != $password) {
		$output = "Your passwords do not match";
	}

	elseif (strlen($password) < 6) {
		$output = "Your password must be atleast 6 characters";
	}

	else {
		//encrypt the password
		$password = md5($password);
		// inserting record into the database
		$insert = $link->query("INSERT INTO studentdata (name, collegeyear, collegehouse, collegeidnum, email, password, voted, leadervoted, sportvoted) VALUES ('$name', $collegeyear, '$collegehouse', $collegeidnum, '$email', '$password', 'no', 'no', 'no')");

		if($insert != TRUE) {
			$output = "There was a problem signing up.";
			$output .= $link->error;
		}

		else{
			$output = "You have been registered successfully!";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Sign Up</title>
	<link rel="stylesheet" type="text/css" href="forms.css">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1>Boboto College Student Sign Up</h1>

<br>

<form method="post">
	Name: <input type="text" name="name"> <br> <br>
	College Year: 		  <input type="radio" name="cyear" value=1> <label>1st year</label> 
						  <input type="radio" name="cyear" value=2> <label>2nd year</label> 
						  <input type="radio" name="cyear" value=3> <label>3rd year</label> 
						  <input type="radio" name="cyear" value=4> <label>4th year</label> <br> <br>

	College Sports House: <input type="radio" name="house" value="Jaune"> <label>Jaune</label> 
						  <input type="radio" name="house" value="Verte"> <label>Verte</label> 
						  <input type="radio" name="house" value="Bleue"> <label>Bleue</label> <br> <br>

	College ID Number: <input type="number" name="idnumber"> <br> <br>
	Email: <input type="text" name="email"> <br> <br>
	Password: <input type="password" name="pwd"> <br> <br>
	Repeat Password: <input type="password" name="repeatpwd"> <br> <br>
	<input type="submit" name="submit" value="Sign up">
	
</form>

<?php
echo $output;
?>

</body>
</html>