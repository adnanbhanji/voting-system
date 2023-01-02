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
  <title>Upload CSV File</title>
  <link rel="stylesheet" type="text/css" href="adminnav.css">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1>Upload CSV File</h1>


  <button class="button"><a href="registercandidate.php">Register Candidate</a></li></button>
  <button class="button"><a href="setelectiontime.php">Set Election Time</a></li></button>
  <button class="button"><a href="viewstudentdata.php">View Student Data</a></li></button>
  <button class="button"><a href="viewelectionresults.php">View Election Results</a></li></button>
  <button class="button"><a href="#">CSV File Upload</a></li></button>



</body>
    <br><br>    
    <h1>Upload CSV File</h1>
    Welcome Mr. <?php echo $name; ?>

    <p>Please upload a CSV file with student records. Click on 'choose file' to pick a file and then click on 'import' to insert records into the system.</p><br><hr>


<br><br>
<form method="POST" enctype="multipart/form-data">
    Upload CSV: <input type="file" name="file"> <br><br>
                <input type="submit" name="submit" value="Import">
</form>


<?php
if (isset($_POST['submit'])) {
  if($_FILES['file']['name']) {
    $filename=explode(".", $_FILES['file']['name']);
    if($filename[1] == 'csv') {
      $handle = fopen($_FILES['file']['tmp_name'], "r");
      while ($data = fgetcsv($handle)) {
        $item1=mysqli_real_escape_string($link, $data[0]);
        $item2=mysqli_real_escape_string($link, $data[1]);
        $item3=mysqli_real_escape_string($link, $data[2]);
        $item4=mysqli_real_escape_string($link, $data[3]);
        $item5=mysqli_real_escape_string($link, $data[4]);
        $item6=mysqli_real_escape_string($link, $data[5]);
        $item7=mysqli_real_escape_string($link, $data[6]);
        $item8=mysqli_real_escape_string($link, $data[7]);
        $item9=mysqli_real_escape_string($link, $data[8]);
        $sql="INSERT into studentdata (name, collegeyear, collegehouse, collegeidnum, email, password, voted, leadervoted, sportvoted) values ('$item1', $item2, '$item3', '$item4', '$item5', '$item6', '$item7', '$item8', '$item9')";
        mysqli_query($link, $sql);
      }
      fclose($handle);

      echo "Successful Import";
    }
  }
}

?>


<br>

<br>



<button class="button5"><a class="whitetextneeded" href='signout.php'> Sign Out </a></button>

</html>