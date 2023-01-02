<?php
include('dbcon.php');
session_start();
$adminuser=$_SESSION['adminuser'];
if(!isset($_SESSION['adminuser']))
{
    // not logged in
    header('Location:adminsignin.php');
    exit();
} 

$query= $link->query("SELECT * FROM admindata WHERE email='$adminuser'");
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
  <title>View Election Results</title>
  <link rel="stylesheet" type="text/css" href="adminnav.css">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1>View Election Results</h1>

  <button class="button"><a href="registercandidate.php">Register Candidate</a></li></button>
  <button class="button"><a href="setelectiontime.php">Set Election Time</a></li></button>
  <button class="button"><a href="viewstudentdata.php">View Student Data</a></li></button>
  <button class="button"><a href="#">View Election Results</a></li></button>
  <button class="button"><a href="csvupload.php">CSV File Upload</a></li></button>



</body>


<br>
<br>
<br>
<br>


  <button class="btn"><a href="captainelectionresults.php">View Captain Election Results</a></li></button>
  <button class="btn"><a href="leaderelectionresults.php">View Leaders Election Results</a></li></button>
  <button class="btn"><a href="Sportselectionresults.php">View Sports House Leaders Election Result</a></li></button>



<br>
<br>


<button class="button5"><a class="whitetextneeded" href='signout.php'> Sign Out </a></button>


</html>