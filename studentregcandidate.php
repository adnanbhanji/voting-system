<?php
include_once 'dbcon.php';
$output = null;

if(isset($_POST['submit'])) {

	$name = $link->real_escape_string($_POST["name"]);
	$email = $link->real_escape_string($_POST["email"]);
	$position= $link->real_escape_string($_POST["position"]);
	$message= $link->real_escape_string($_POST["message"]);
	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

	$query = $link->query("SELECT * FROM candidates WHERE email = '$email'");

	if(empty($name) or empty($email) or empty($position) or empty($message)) {

		$output = "Please fill in all the fields!";
	}

	elseif($query->num_rows != 0) {
		$output = "You cannot register twice as a candidate!";
	}

	else {

		// inserting record into the database
		$insert = $link->query("INSERT INTO candidates (name, email, position, message, nvotes, approval, image) VALUES ('$name', '$email', '$position', '$message', '0', 'no', '$file')");

		if($insert != TRUE) {
			$output = "There was a problem registering you as a candidate";
			$output .= $link->error;
		}

		else{
			$output = "Thank you for registering as a candidate. Mr. Seba will take this forward";
		}
	}
}

?>

<br>

<!DOCTYPE html>
<html>
<head>
	<title>Register to become a candidate</title>
	<link rel="stylesheet" type="text/css" href="forms.css">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1>Register to become a candidate</h1>
<br>

<form method="post" enctype="multipart/form-data">
	Name: <br> <input type="text" name="name"> <br> <br>
	Email: <br> <input type="text" name="email"> <br> <br>

	Position: <br>
		<select name="position">
              <option>--Select--</option>
              <option value="MaleCaptain">College Male Captain</option>
              <option value="FemaleCaptain">College Female Captain</option>
              <option value="3MaleLeader">College 3rd year Male Leader</option>
              <option value="3FemaleLeader">College 3rd year Female Leader</option>
              <option value="2MaleLeader">College 2nd year Male Leader</option>
              <option value="2FemaleLeader">College 2nd year Female Leader</option>
              <option value="1MaleLeader">College 1st year Male Leader</option>
              <option value="1FemaleLeader">College 1st year Female Leader</option>
              <option value="JauneMale">Jaune Sports House Male Leader</option>
              <option value="JauneFemale ">Jaune Sports House Female Leader</option>
              <option value="BleueMale ">Bleue Sports House Male Leader</option>
              <option value="BleueFemale ">Bleue Sports House Female Leader</option>
              <option value="VerteMale ">Verte Sports House Male Leader</option>
              <option value="VerteFemale ">Verte Sports House Female Leader</option>
        </select> <br><br>

	Message to audience: <br> <textarea rows="5" name="message"> </textarea> <br> <br>

	Enter your Image: <input type="file" name="image" id="image"> <br><br>

	<input type="submit" name="submit">

</form>



<?php
echo $output;
?>

</body>
</html>