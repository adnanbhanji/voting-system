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
  <title>View Student Data</title>
  <link rel="stylesheet" type="text/css" href="adminnav.css?ver=<?php echo rand(111,999)?>">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1>View Student Data</h1>


  <button class="button"><a href="registercandidate.php">Register Candidate</a></li></button>
  <button class="button"><a href="setelectiontime.php">Set Election Time</a></li></button>
  <button class="button"><a href="#">View Student Data</a></li></button>
  <button class="button"><a href="viewelectionresults.php">View Election Results</a></li></button>
  <button class="button"><a href="csvupload.php">CSV File Upload</a></li></button>




<br><br>
Welcome Mr. <?php echo $name; ?>

<br>
<h4>Here, you can view all the students in the Boboto College Election system. If you do not recognize any, you can delete them from the system. </h4>
<br>

<form action="viewstudentdata.php" method="post">

<h3>College Year 1 students</h3><br><br>

<?php
$query1=$link->query("SELECT * FROM studentdata WHERE collegeyear=1");
?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Full Name of Student</th>
          <th scope="col">College ID Number</th>
          <th scope="col">College Year</th>
          <th scope="col">College Sports House</th>
          <th scope="col">Email</th>
          <th scope="col">Captain Election Voted</th>
          <th scope="col">Leader ELection Voted</th>
          <th scope="col">Sports House Election Voted</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
     
<?php
while($row1 = mysqli_fetch_array($query1)){

echo '<form method="POST">';
echo "<tr>";
echo "<td>" . $row1['name'] . "</td>"; 
echo "<td>" . $row1['collegeidnum'] . "</td>";
echo "<td>" . $row1['collegeyear']. "</td>";
echo "<td>" . $row1['collegehouse']. "</td>";
echo "<td>" . $row1['email'] . "</td>";
echo "<td>" . $row1['voted'] . "</td>";
echo "<td>" . $row1['leadervoted'] . "</td>";
echo "<td>" . $row1['sportvoted'] . "</td>";
//echo "<td>" . $row['pwd'] . "</td>";
echo '<td><button type="submit" name="deleteItem" value="'.$row1['id'].'">Delete Candidate</button></td>';
if(isset($_POST['deleteItem']))
{
  $delete1 = $_POST['deleteItem'];
  $deletequery1 = $link->query("DELETE FROM studentdata WHERE id = '$delete1'");
  echo '<script>window.location.href="viewstudentdata.php"</script>';  

}
echo "</tr>";
echo "</form>";
}
?>
  
</tbody>
</table>

<br><br><br>



<h3>College Year 2 students</h3><br><br>

<?php
$query2=$link->query("SELECT * FROM studentdata WHERE collegeyear=2");
?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Full Name of Student</th>
          <th scope="col">College ID Number</th>
          <th scope="col">College Year</th>
          <th scope="col">College Sports House</th>
          <th scope="col">Email</th>
          <th scope="col">Captain Election Voted</th>
          <th scope="col">Leader ELection Voted</th>
          <th scope="col">Sports House Election Voted</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
     
<?php
while($row2 = mysqli_fetch_array($query2)){

echo '<form method="POST">';
echo "<tr>";
echo "<td>" . $row2['name'] . "</td>"; 
echo "<td>" . $row2['collegeidnum'] . "</td>";
echo "<td>" . $row2['collegeyear']. "</td>";
echo "<td>" . $row2['collegehouse']. "</td>";
echo "<td>" . $row2['email'] . "</td>";
echo "<td>" . $row2['voted'] . "</td>";
echo "<td>" . $row2['leadervoted'] . "</td>";
echo "<td>" . $row2['sportvoted'] . "</td>";
//echo "<td>" . $row['pwd'] . "</td>";
echo '<td><button type="submit" name="deleteItem" value="'.$row2['id'].'">Delete Candidate</button></td>';
if(isset($_POST['deleteItem']))
{
  $delete2 = $_POST['deleteItem'];
  $deletequery2 = $link->query("DELETE FROM studentdata WHERE id = '$delete2'");
  echo '<script>window.location.href="viewstudentdata.php"</script>';  

}
echo "</tr>";
echo "</form>";
}
?>
  
</tbody>
</table>
<br><br><br>


<h3>College Year 3 students</h3><br><br>

<?php
$query3=$link->query("SELECT * FROM studentdata WHERE collegeyear=3");
?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Full Name of Student</th>
          <th scope="col">College ID Number</th>
          <th scope="col">College Year</th>
          <th scope="col">College Sports House</th>
          <th scope="col">Email</th>
          <th scope="col">Captain Election Voted</th>
          <th scope="col">Leader ELection Voted</th>
          <th scope="col">Sports House Election Voted</th>  
          <th scope="col">Delete</th>        
        </tr>
      </thead>
      <tbody>
     
<?php
while($row3 = mysqli_fetch_array($query3)){

echo '<form method="POST">';
echo "<tr>";
echo "<td>" . $row3['name'] . "</td>"; 
echo "<td>" . $row3['collegeidnum'] . "</td>";
echo "<td>" . $row3['collegeyear']. "</td>";
echo "<td>" . $row3['collegehouse']. "</td>";
echo "<td>" . $row3['email'] . "</td>";
echo "<td>" . $row3['voted'] . "</td>";
echo "<td>" . $row3['leadervoted'] . "</td>";
echo "<td>" . $row3['sportvoted'] . "</td>";
//echo "<td>" . $row['pwd'] . "</td>";
echo '<td><button type="submit" name="deleteItem" value="'.$row3['id'].'">Delete Candidate</button></td>';
if(isset($_POST['deleteItem']))
{
  $delete3 = $_POST['deleteItem'];
  $deletequery3 = $link->query("DELETE FROM studentdata WHERE id = '$delete3'");
  echo '<script>window.location.href="viewstudentdata.php"</script>';  

}
echo "</tr>";
echo "</form>";
}
?>
  
</tbody>
</table>
<br><br><br>



<h3>College Year 4 students</h3><br><br>

<?php
$query4=$link->query("SELECT * FROM studentdata WHERE collegeyear=4");
?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Full Name of Student</th>
          <th scope="col">College ID Number</th>
          <th scope="col">College Year</th>
          <th scope="col">College Sports House</th>
          <th scope="col">Email</th>
          <th scope="col">Captain Election Voted</th>
          <th scope="col">Leader ELection Voted</th>
          <th scope="col">Sports House Election Voted</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
     
<?php
while($row4 = mysqli_fetch_array($query4)){

echo '<form method="POST">';
echo "<tr>";
echo "<td>" . $row4['name'] . "</td>"; 
echo "<td>" . $row4['collegeidnum'] . "</td>";
echo "<td>" . $row4['collegeyear']. "</td>";
echo "<td>" . $row4['collegehouse']. "</td>";
echo "<td>" . $row4['email'] . "</td>";
echo "<td>" . $row4['voted'] . "</td>";
echo "<td>" . $row4['leadervoted'] . "</td>";
echo "<td>" . $row4['sportvoted'] . "</td>";
//echo "<td>" . $row['pwd'] . "</td>";
echo '<td><button type="submit" name="deleteItem" value="'.$row4['id'].'">Delete Candidate</button></td>';
if(isset($_POST['deleteItem']))
{
  $delete4 = $_POST['deleteItem'];
  $deletequery4 = $link->query("DELETE FROM studentdata WHERE id = '$delete4'");
  echo '<script>window.location.href="viewstudentdata.php"</script>';  

}
echo "</tr>";
echo "</form>";
}
?>
  
</tbody>
</table>
<br><br><br>



<form class="inlines" method="post">
  <input type="submit" name="submitcaptain" value="Email for Captain Election Reminder">
</form>

<?php

  if (isset($_POST['submitcaptain'])) {
  $sqlcap = $link->query("SELECT * FROM studentdata WHERE voted='no'");
    if (mysqli_num_rows($sqlcap)>0) {
     
          require 'phpmailer/PHPMailerAutoload.php';
          require 'credentials.php';
          
          $mail = new PHPMailer;
          $mail->isSMTP();                                      
          $mail->Host = 'smtp.gmail.com';  
          $mail->SMTPAuth = true;                              
          $mail->Username = EMAIL;                 
          $mail->Password = PASS;                           
          $mail->SMTPSecure = 'tls';                            
          $mail->Port = 587;                                    
          $mail->setFrom(EMAIL, 'Boboto College Election');
          $mail->isHTML(true);                                  
          $mail->Subject = 'Reminder: RE';
          $mail->Body    = 'Kindly take part in the Captain election';
          
          while($rowcap=mysqli_fetch_array($sqlcap)) {
          $mail->addBCC($rowcap['email']);
          //$mail->addAddress($capquery['email']); 
          }

          if($mail->Send()) {
            echo 'An email has been sent!';
          } else {
            echo 'Mail not sent';
          }
        }
      }
?>

<form class="inlines" method="post">
  <input type="submit" name="submitleader" value="Email for Leader Election Reminder">
</form>

<?php

  if (isset($_POST['submitleader'])) {
  $sqlleader = $link->query("SELECT * FROM studentdata WHERE leadervoted='no'");
    if (mysqli_num_rows($sqlleader)>0) {
     
          require 'phpmailer/PHPMailerAutoload.php';
          require 'credentials.php';
          
          $mail = new PHPMailer;
          $mail->isSMTP();                                      
          $mail->Host = 'smtp.gmail.com';  
          $mail->SMTPAuth = true;                              
          $mail->Username = EMAIL;                 
          $mail->Password = PASS;                           
          $mail->SMTPSecure = 'tls';                            
          $mail->Port = 587;                                    
          $mail->setFrom(EMAIL, 'Boboto College Election');
          $mail->isHTML(true);                                  
          $mail->Subject = 'Reminder: RE';
          $mail->Body    = 'Kindly take part in the Leader election';
          
          while($rowleader=mysqli_fetch_array($sqlleader)) {
          $mail->addBCC($rowleader['email']);
          //$mail->addAddress($capquery['email']); 
          }

          if($mail->Send()) {
            echo 'An email has been sent!';
          } else {
            echo 'Mail not sent';
          }
        }
      }
?>



<form class="inlines" method="post">
  <input type="submit" name="submitsport" value="Email for Sport House Election Reminder">
</form>

<?php

  if (isset($_POST['submitsport'])) {
  $sqlsport = $link->query("SELECT * FROM studentdata WHERE sportvoted='no'");
    if (mysqli_num_rows($sqlsport)>0) {
     
          require 'phpmailer/PHPMailerAutoload.php';
          require 'credentials.php';
          
          $mail = new PHPMailer;
          $mail->isSMTP();                                      
          $mail->Host = 'smtp.gmail.com';  
          $mail->SMTPAuth = true;                              
          $mail->Username = EMAIL;                 
          $mail->Password = PASS;                           
          $mail->SMTPSecure = 'tls';                            
          $mail->Port = 587;                                    
          $mail->setFrom(EMAIL, 'Boboto College Election');
          $mail->isHTML(true);                                  
          $mail->Subject = 'Reminder: RE';
          $mail->Body    = 'Kindly take part in the Sport House election';
          
          while($rowsport=mysqli_fetch_array($sqlsport)) {
          $mail->addBCC($rowsport['email']);
          //$mail->addAddress($capquery['email']); 
          }

          if($mail->Send()) {
            echo 'An email has been sent!';
          } else {
            echo 'Mail not sent';
          }
        }
      }
?>
  

<br><br>
</form>
<button class="button5"><a class="whitetextneeded" href='signout.php'> Sign Out </a></button>
</form>


</body>
  
</html>