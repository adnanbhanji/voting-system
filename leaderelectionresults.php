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
  <title>View Leader Election Results</title>
  <link rel="stylesheet" type="text/css" href="adminnav.css">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1>View Leader Election Results</h1>

Welcome Mr. <?php echo $name; ?>
<br><br>

<h2>College Year 1</h2>

    <h2>Male Leader</h2>
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
            $m1query=$link->query("SELECT * FROM candidates WHERE position='1MaleLeader'");
            if($m1query) {
                while ($m1row=mysqli_fetch_array($m1query)) {
                    echo '<form method="POST">';
                    echo '<tr>';
                    echo '<td>'.$m1row['name'].'</td>';
                    echo '<td>'.$m1row['nvotes'].'</td>';
                    echo '<td><button type="submit" name="deleteItem" value="'.$m1row['id'].'">Delete Candidate</button></td>';
                   
                    if(isset($_POST['deleteItem']))
                    {
                      $m1delete = $_POST['deleteItem'];
                      $m1sql = mysqli_query($link, "DELETE FROM candidates WHERE id = '$m1delete'");
                      echo '<script>window.location.href="leaderelectionresults.php"</script>';

                    }
                    echo "</tr>";
                    echo "</form>";
                    }
                }
            ?>

        </tbody>
        </table>
        <hr><br><br><br>

          <h2>Female Leader</h2>
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
            $f1query=$link->query("SELECT * FROM candidates WHERE position='1FemaleLeader'");
            if($f1query) {
                while ($f1row=mysqli_fetch_array($f1query)) {
                    echo '<form method="POST">';
                    echo '<tr>';
                    echo '<td>'.$f1row['name'].'</td>';
                    echo '<td>'.$f1row['nvotes'].'</td>';
                    echo '<td><button type="submit" name="deleteItem" value="'.$f1row['id'].'">Delete Candidate</button></td>';
                   
                    if(isset($_POST['deleteItem']))
                    {
                      $f1delete = $_POST['deleteItem'];
                      $f1sql = mysqli_query($link, "DELETE FROM candidates WHERE id = '$f1delete'");
                      echo '<script>window.location.href="leaderelectionresults.php"</script>';

                    }
                    echo "</tr>";
                    echo "</form>";
                    }
                }
            ?>
        </tbody>
        </table>
        <hr><br><br><br>


        <h2>College Year 2</h2>

    <h2>Male Leader</h2>
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
            $m2query=$link->query("SELECT * FROM candidates WHERE position='2MaleLeader'");
            if($m2query) {
                while ($m2row=mysqli_fetch_array($m2query)) {
                    echo '<form method="POST">';
                    echo '<tr>';
                    echo '<td>'.$m2row['name'].'</td>';
                    echo '<td>'.$m2row['nvotes'].'</td>';
                    echo '<td><button type="submit" name="deleteItem" value="'.$m2row['id'].'">Delete Candidate</button></td>';
                   
                    if(isset($_POST['deleteItem']))
                    {
                      $m2delete = $_POST['deleteItem'];
                      $m2sql = mysqli_query($link, "DELETE FROM candidates WHERE id = '$m2delete'");
                      echo '<script>window.location.href="leaderelectionresults.php"</script>';

                    }
                    echo "</tr>";
                    echo "</form>";
                    }
                }
            ?>

        </tbody>
        </table>
        <hr><br><br><br>

          <h2>Female Leader</h2>
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
            $f2query=$link->query("SELECT * FROM candidates WHERE position='2FemaleLeader'");
            if($f2query) {
                while ($f2row=mysqli_fetch_array($f2query)) {
                    echo '<form method="POST">';
                    echo '<tr>';
                    echo '<td>'.$f2row['name'].'</td>';
                    echo '<td>'.$f2row['nvotes'].'</td>';
                    echo '<td><button type="submit" name="deleteItem" value="'.$f2row['id'].'">Delete Candidate</button></td>';
                   
                    if(isset($_POST['deleteItem']))
                    {
                      $f2delete = $_POST['deleteItem'];
                      $f2sql = mysqli_query($link, "DELETE FROM candidates WHERE id = '$f2delete'");
                      echo '<script>window.location.href="leaderelectionresults.php"</script>';

                    }
                    echo "</tr>";
                    echo "</form>";
                    }
                }
            ?>
        </tbody>
        </table>
        <hr><br><br><br>


            <h2>College Year 3</h2>

    <h2>Male Leader</h2>
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
            $m3query=$link->query("SELECT * FROM candidates WHERE position='3MaleLeader'");
            if($m3query) {
                while ($m3row=mysqli_fetch_array($m3query)) {
                    echo '<form method="POST">';
                    echo '<tr>';
                    echo '<td>'.$m3row['name'].'</td>';
                    echo '<td>'.$m3row['nvotes'].'</td>';
                    echo '<td><button type="submit" name="deleteItem" value="'.$m3row['id'].'">Delete Candidate</button></td>';
                   
                    if(isset($_POST['deleteItem']))
                    {
                      $m3delete = $_POST['deleteItem'];
                      $m3sql = mysqli_query($link, "DELETE FROM candidates WHERE id = '$m3delete'");
                      echo '<script>window.location.href="leaderelectionresults.php"</script>';

                    }
                    echo "</tr>";
                    echo "</form>";
                    }
                }
            ?>

        </tbody>
        </table>
        <hr><br><br><br>

          <h2>Female Leader</h2>
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
            $f3query=$link->query("SELECT * FROM candidates WHERE position='3FemaleLeader'");
            if($f3query) {
                while ($f3row=mysqli_fetch_array($f3query)) {
                    echo '<form method="POST">';
                    echo '<tr>';
                    echo '<td>'.$f3row['name'].'</td>';
                    echo '<td>'.$f3row['nvotes'].'</td>';
                    echo '<td><button type="submit" name="deleteItem" value="'.$f3row['id'].'">Delete Candidate</button></td>';
                   
                    if(isset($_POST['deleteItem']))
                    {
                      $f3delete = $_POST['deleteItem'];
                      $f3sql = mysqli_query($link, "DELETE FROM candidates WHERE id = '$f3delete'");
                      echo '<script>window.location.href="leaderelectionresults.php"</script>';

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
