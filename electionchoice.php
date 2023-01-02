<?php
include('dbcon.php');
session_start();
$studentuser=$_SESSION['user'];
if(!isset($_SESSION['user']))
{
    // not logged in
    header('Location:signin.php');
    exit();
} 

$query= $link->query("SELECT * FROM studentdata WHERE email='$studentuser'");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $password=$row['password'];
      }
    }
?>


<!DOCTYPE html>
<html>
<head>
  <title>Election Choice Interface</title>
  <link rel="stylesheet" type="text/css" href="electionchoice.css">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1>Boboto Election Choice Interface</h1>

<br>
Welcome <?php echo $name ?>
<br>

  <button class="button"><a href="entirecaptainselection.php">Entire College Captains Election</a></button> <br><br>
  <button class="button"><a href="yearlyleaderelections.php">Yearly College Leader Elections</a></button> <br><br>
  <button class="button"><a href="sportshouse.php">Sports House Elections</a></button>


</body>

<br>
<br>


<button class = "button5"><a class="whitetextneeded" href= 'signout.php'> Sign Out </a></button>

</html>