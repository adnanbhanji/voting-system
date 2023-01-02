<?php
include('dbcon.php');
session_start();
date_default_timezone_set('Africa/Kinshasa');
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
  <title>Set Sports House Leader ELection time</title>
  <link rel="stylesheet" type="text/css" href="electiontimes.css">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1>Set Sports House Leader ELection time</h1>
Welcome Mr. <?php echo $name; ?>
<br><br>

<p>Enter the start and end time of the election.</p><br>

<form method="post">

Starting Date: <input type="date" name="start_date"> <br><br>
Starting Time: <input type="time" name="start_time"><br><br>
Ending Date:   <input type="date" name="end_date"><br><br>
Ending Time:   <input type="time" name="end_time"> <br><br>
               <input type="submit" name="submit"><br><br>
</form>

<?php
    if (isset($_POST['submit'])) {
        $start_date=$_POST['start_date'];
        $start_time=$_POST['start_time'];
        $end_date=$_POST['end_date'];
        $end_time=$_POST['end_time'];

        $ds=$start_date.' '.$start_time;
        $de=$end_date.' '.$end_time;

        $dateTimestamp1=strtotime($ds);
        $dateTimestamp2=strtotime($de);

        $select=$link->query("SELECT * FROM vote_time WHERE electiontype='sport'");
        if($select) {
            while($row=mysqli_fetch_array($select)) {
                $id1=$row['id'];
                $vote_start=$row['vote_start'];
                $vote_end=$row['vote_end'];
            }
            $update=$link->query("UPDATE vote_time SET vote_start='$dateTimestamp1', vote_end='$dateTimestamp2' WHERE id='$id1'");
        if($update) {
            echo 'You have successfully changed the voting time.';
        }
        }

        
    }

    ?>