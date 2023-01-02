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
  <title>View Sports House Leader Election Results</title>
  <link rel="stylesheet" type="text/css" href="adminnav.css">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1>View Sport House Leader Election Results</h1>

Welcome Mr. <?php echo $name; ?>
<br><br>

<h2>Jaune House</h2>

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
            $jmquery=$link->query("SELECT * FROM candidates WHERE position='JauneMale'");
            if($jmquery) {
                while ($jmrow=mysqli_fetch_array($jmquery)) {
                    echo '<form method="POST">';
                    echo '<tr>';
                    echo '<td>'.$jmrow['name'].'</td>';
                    echo '<td>'.$jmrow['nvotes'].'</td>';
                    echo '<td><button type="submit" name="deleteItem" value="'.$jmrow['id'].'">Delete Candidate</button></td>';
                   
                    if(isset($_POST['deleteItem']))
                    {
                      $jmdelete = $_POST['deleteItem'];
                      $jmsql = mysqli_query($link, "DELETE FROM candidates WHERE id = '$jmdelete'");
                      echo '<script>window.location.href="Sportselectionresults.php"</script>';

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
            $jfquery=$link->query("SELECT * FROM candidates WHERE position='JauneFemale'");
            if($jfquery) {
                while ($jfrow=mysqli_fetch_array($jfquery)) {
                    echo '<form method="POST">';
                    echo '<tr>';
                    echo '<td>'.$jfrow['name'].'</td>';
                    echo '<td>'.$jfrow['nvotes'].'</td>';
                    echo '<td><button type="submit" name="deleteItem" value="'.$jfrow['id'].'">Delete Candidate</button></td>';
                   
                    if(isset($_POST['deleteItem']))
                    {
                      $jfdelete = $_POST['deleteItem'];
                      $jfsql = mysqli_query($link, "DELETE FROM candidates WHERE id = '$jfdelete'");
                      echo '<script>window.location.href="Sportselectionresults.php"</script>';

                    }
                    echo "</tr>";
                    echo "</form>";
                    }
                }
            ?>
        </tbody>
        </table>
        <hr><br><br><br>


        <h2>Verte House</h2>

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
            $vmquery=$link->query("SELECT * FROM candidates WHERE position='VerteMale'");
            if($vmquery) {
                while ($vmrow=mysqli_fetch_array($vmquery)) {
                    echo '<form method="POST">';
                    echo '<tr>';
                    echo '<td>'.$vmrow['name'].'</td>';
                    echo '<td>'.$vmrow['nvotes'].'</td>';
                    echo '<td><button type="submit" name="deleteItem" value="'.$vmrow['id'].'">Delete Candidate</button></td>';
                   
                    if(isset($_POST['deleteItem']))
                    {
                      $vmdelete = $_POST['deleteItem'];
                      $vmsql = mysqli_query($link, "DELETE FROM candidates WHERE id = '$vmdelete'");
                      echo '<script>window.location.href="Sportselectionresults.php"</script>';

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
            $vfquery=$link->query("SELECT * FROM candidates WHERE position='VerteFemale'");
            if($vfquery) {
                while ($vfrow=mysqli_fetch_array($vfquery)) {
                    echo '<form method="POST">';
                    echo '<tr>';
                    echo '<td>'.$vfrow['name'].'</td>';
                    echo '<td>'.$vfrow['nvotes'].'</td>';
                    echo '<td><button type="submit" name="deleteItem" value="'.$vfrow['id'].'">Delete Candidate</button></td>';
                   
                    if(isset($_POST['deleteItem']))
                    {
                      $vfdelete = $_POST['deleteItem'];
                      $vfsql = mysqli_query($link, "DELETE FROM candidates WHERE id = '$vfdelete'");
                      echo '<script>window.location.href="Sportselectionresults.php"</script>';

                    }
                    echo "</tr>";
                    echo "</form>";
                    }
                }
            ?>

               </tbody>
        </table>
        <hr><br><br><br>



          <h2>Bleue House</h2>

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
            $bmquery=$link->query("SELECT * FROM candidates WHERE position='BleueMale'");
            if($bmquery) {
                while ($bmrow=mysqli_fetch_array($bmquery)) {
                    echo '<form method="POST">';
                    echo '<tr>';
                    echo '<td>'.$bmrow['name'].'</td>';
                    echo '<td>'.$bmrow['nvotes'].'</td>';
                    echo '<td><button type="submit" name="deleteItem" value="'.$bmrow['id'].'">Delete Candidate</button></td>';
                   
                    if(isset($_POST['deleteItem']))
                    {
                      $bmdelete = $_POST['deleteItem'];
                      $bmsql = mysqli_query($link, "DELETE FROM candidates WHERE id = '$bmdelete'");
                      echo '<script>window.location.href="Sportselectionresults.php"</script>';

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
            $bfquery=$link->query("SELECT * FROM candidates WHERE position='BleueFemale'");
            if($vfquery) {
                while ($bfrow=mysqli_fetch_array($bfquery)) {
                    echo '<form method="POST">';
                    echo '<tr>';
                    echo '<td>'.$bfrow['name'].'</td>';
                    echo '<td>'.$bfrow['nvotes'].'</td>';
                    echo '<td><button type="submit" name="deleteItem" value="'.$bfrow['id'].'">Delete Candidate</button></td>';
                   
                    if(isset($_POST['deleteItem']))
                    {
                      $bfdelete = $_POST['deleteItem'];
                      $bfsql = mysqli_query($link, "DELETE FROM candidates WHERE id = '$bfdelete'");
                      echo '<script>window.location.href="Sportselectionresults.php"</script>';

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
