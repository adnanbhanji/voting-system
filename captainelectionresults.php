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
  <title>View Captain Election Results</title>
  <link rel="stylesheet" type="text/css" href="adminnav.css">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1>View Captain Election Results</h1>
    Hello Mr. <?php echo $name; ?>


    <h2>Male Captain</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Candidate</th>
              <th scope="col">Number of Votes</th>
              <th scope="col">Delete Candidate</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $mquery=$link->query("SELECT * FROM candidates WHERE position='MaleCaptain'");
            if($mquery) {
                while ($mrow=mysqli_fetch_array($mquery)) {
                    echo '<form method="POST">';
                    echo '<tr>';
                    echo '<td>'.$mrow['name'].'</td>';
                    echo '<td>'.$mrow['nvotes'].'</td>';
                    echo '<td><button type="submit" name="deleteItem" value="'.$mrow['id'].'">Delete Candidate</button></td>';
                   
                    if(isset($_POST['deleteItem']))
                    {
                      $mdelete = $_POST['deleteItem'];
                      $msql = mysqli_query($link, "DELETE FROM candidates WHERE id = '$mdelete'");
                      echo '<script>window.location.href="captainelectionresults.php"</script>';

                    }
                    echo "</tr>";
                    echo "</form>";
                    }
                }
            ?>
        </tbody>
        </table>
        <hr><br><br><br>

          <h2>Female Captain</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Candidate</th>
              <th scope="col">Number of Votes</th>
              <th scope="col">Delete Candidate</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $fquery=$link->query("SELECT * FROM candidates WHERE position='FemaleCaptain'");
            if($fquery) {
                while ($frow=mysqli_fetch_array($fquery)) {
                    echo '<form method="POST">';
                    echo '<tr>';
                    echo '<td>'.$frow['name'].'</td>';
                    echo '<td>'.$frow['nvotes'].'</td>';
                    echo '<td><button type="submit" name="deleteItem" value="'.$frow['id'].'">Delete Candidate</button></td>';
                   
                    if(isset($_POST['deleteItem']))
                    {
                      $fdelete = $_POST['deleteItem'];
                      $fsql = mysqli_query($link, "DELETE FROM candidates WHERE id = '$fdelete'");
                      echo '<script>window.location.href="captainelectionresults.php"</script>';

                    }
                    echo "</tr>";
                    echo "</form>";
                    }
                }
            ?>
        </tbody>
        </table>
        <hr><br><br><br>

<button class="button5"><a class="whitetextneeded" href='signout.php'> Sign Out </a></button>

