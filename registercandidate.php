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
  <title>Register Candidate</title>
  <link rel="stylesheet" type="text/css" href="adminnav.css">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1>Register Candidate</h1>


 <button class="button"><a href="#">Register Candidate</a></button>
 <button class="button"><a href="setelectiontime.php">Set Election Time</a></button>
 <button class="button"><a href="viewstudentdata.php">View Student Data</a></button>
 <button class="button"><a href="viewelectionresults.php">View Election Results</a></button>
 <button class="button"><a href="csvupload.php">CSV File Upload</a></button>


<br><br>

<p>Approve or deny candidates here.</p><br>

<table class="table" width= "90%" border="1px" cellpadding="5px" cellspacing="5px">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Position</th>
      <th scope="col">Message</th>
      <th scope="col">Accept Candidate</th>
      <th scope="col">Reject Candidate</th>
    </tr>
  </thead>

          
 <?php


 // $query2=$link->query("SELECT * FROM candidates WHERE approval='no'");
 // while($row=mysqli_fetch_array($query2)) {

 $query2 = "SELECT * FROM candidates WHERE approval = 'no'";
  $result = mysqli_query($link,$query2);
  if (!$result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
    }
    
    else{
    while($row = mysqli_fetch_array($result)){


     echo '<form method="POST">';
     echo '<tr>';
     echo '<td>'.$row['name'].'</td>';
     echo '<td>'.$row['email'].'</td>';
     echo '<td>'.$row['position'].'</td>';
     echo '<td>'.$row['message'].'</td>';
     echo '<td><button type="submit" name="acceptCandidate" value="'.$row['id'].'">Accept Candidate</button></td>';
     echo '<td><button type="submit" name="rejectCandidate" value="'.$row['id'].'">Reject Candidate</button></td>';
             
       if(isset($_POST['acceptCandidate'])) 
       {
         $accept = $_POST['acceptCandidate'];
         $query2 = $link->query("UPDATE candidates set approval='yes' WHERE id='$accept'");
         if($query2) {
            $output='Candidate '. $row['name'] . 'has been successfully added to the system';
            }}

       if(isset($_POST['rejectCandidate']))
        {
        $reject = $_POST['rejectCandidate'];
          $del=$link->query ("DELETE FROM candidates WHERE id='$reject'");
          $output = 'You have rejected candidate ' . $row['name'];
           }} }

           ?>
</table>


<br><br><br>


</form>


<button class="button5"><a class="whitetextneeded" href='signout.php'> Sign Out </a></button>



</body>
</html>
