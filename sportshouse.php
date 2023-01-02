<?php
include('dbcon.php');
session_start();
$output = null;

$studentuser=$_SESSION['user'];
if(!isset($_SESSION['user']))
{
    // not logged in
    header('Location:signin.php');
    exit();
} 
 
date_default_timezone_set('Africa/Kinshasa'); //setting our timezone
$date = date('m/d/Y H:i:s', time()); //setting the date format
$select=$link->query("SELECT * FROM vote_time WHERE electiontype='sport'");
while($row=mysqli_fetch_array($select)) {
    $ds=$row['vote_start'];
    $dt=$row['vote_end'];
}//line 22 to 25: fetching the start and end time set for the election
$dateTimestamp1=strtotime($date);//converting the date to string
$dateTimestamp2=$ds; //line 27 and 28: renaming $ds and $dt
$dateTimestamp3=$dt;

$query = $link->query("SELECT * FROM studentdata WHERE email='$studentuser'");
if (mysqli_num_rows($query) != 0) 
{
    while ($row = mysqli_fetch_array($query)) {
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $sportvoted = $row['sportvoted'];
              
                if($sportvoted == "yes"){
                    echo '<script>window.location.href="multiplevote.php"</script>';
                }
                else{
                     if($dateTimestamp1 < $dateTimestamp2) {
                    echo '<script>window.location.href="multiplevote.php"</script>';//too early to vote
                  } else {
                    if($dateTimestamp1 > $dateTimestamp3) {
                      echo '<script>window.location.href="multiplevote.php"</script>';//too late to vote
                    }
                }
                }
              }
            }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sports House Leader Elections</title>
  <link rel="stylesheet" type="text/css" href="vote.css">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1>Sports House Leader Elections</h1>


<br>
<h1 align="center">WELCOME, <?php echo $name; ?></h1>

  <p>Select one option for each category. This should be the person you think would be most suitable for that position. Take the decision without using too much influence from peers. Remember that you will not be able to vote after pressing the submit button.</p>

<form method="POST" name="voting" action="submitsport.php">
<h2>Voter Details</h2>

 Name of Voter: <br><input type="text" readonly value="<?php echo $name; ?>" name="voter"> <br><br>
 Email Address: <br><input type="text" readonly value="<?php echo $email; ?>" name="email">
    
 <br><br><hr>

<h2>Male Leader</h2>
<label>Please Select a Male Leader from the Given List.</label> <br><br>
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Candidate Name</th>
      <th scope="col">Message to Voters</th>
      <th scope="col">Candidate Image</th>
    </tr>
  </thead>
  <tbody>
   
    <?php
    $jquerymaleleader=$link->query("SELECT * FROM studentdata WHERE email='$studentuser' AND collegehouse='Jaune'");
    if(mysqli_num_rows($jquerymaleleader)>0) {
    $querymj=$link->query("SELECT * FROM candidates WHERE position='JauneMale' AND approval='yes'");
    if(mysqli_num_rows($querymj)>0) {
        while ($row=mysqli_fetch_array($querymj)) {
          echo '<tr>';
          echo '<td>';
          echo '<input type="radio" name="malesport" value="' . $row['name'] . '" checked>' ;
          echo '</td>';
          echo '<td>';
          echo $row['name'];
          echo '</td>';
          echo '<td>';
          echo $row['message'];
          echo '</td>';
          echo '<td>';
          echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width:150px; height:170px;">';
          echo '</td>';
          echo '</tr>';
        }
      }
  }

      else {
      $vquerymaleleader=$link->query("SELECT * FROM studentdata WHERE email='$studentuser' AND collegehouse='Verte'");
    if(mysqli_num_rows($vquerymaleleader)>0) {
    $querymv=$link->query("SELECT * FROM candidates WHERE position='VerteMale' AND approval='yes'");
    if(mysqli_num_rows($querymv)>0) {
        while ($row=mysqli_fetch_array($querymv)) {
          echo '<tr>';
          echo '<td>';
          echo '<input type="radio" name="malesport" value="' . $row['name'] . '" checked>' ;
          echo '</td>';
          echo '<td>';
          echo $row['name'];
          echo '</td>';
          echo '<td>';
          echo $row['message'];
          echo '</td>';
          echo '<td>';
          echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width:150px; height:170px;">';
          echo '</td>';
          echo '</tr>';
        }
      }
  }

       else {
      $bquerymaleleader=$link->query("SELECT * FROM studentdata WHERE email='$studentuser' AND collegehouse='Bleue'");
    if(mysqli_num_rows($bquerymaleleader)>0) {
    $querymb=$link->query("SELECT * FROM candidates WHERE position='BleueMale' AND approval='yes'");
    if(mysqli_num_rows($querymb)>0) {
        while ($row=mysqli_fetch_array($querymb)) {
          echo '<tr>';
          echo '<td>';
          echo '<input type="radio" name="malesport" value="' . $row['name'] . '" checked>' ;
          echo '</td>';
          echo '<td>';
          echo $row['name'];
          echo '</td>';
          echo '<td>';
          echo $row['message'];
          echo '</td>';
          echo '<td>';
          echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width:150px; height:170px;">';
          echo '</td>';
          echo '</tr>';
        }
      }
  }
}
}
      
?>
</tbody>
</table>


<br><hr><br>


<h2>Female Leader</h2>
<label>Please Select a Female Leader from the Given List.</label> <br><br>
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Candidate Name</th>
      <th scope="col">Message to Voters</th>
      <th scope="col">Candidate Image</th>
    </tr>
  </thead>
  <tbody>
   
    <?php
        $jqueryfemaleleader=$link->query("SELECT * FROM studentdata WHERE email='$studentuser' AND collegehouse='Jaune'");
    if(mysqli_num_rows($jquerymaleleader)>0) {
    $queryfj=$link->query("SELECT * FROM candidates WHERE position='JauneFemale' AND approval='yes'");
    if(mysqli_num_rows($queryfj)>0) {
        while ($row=mysqli_fetch_array($queryfj)) {
          echo '<tr>';
          echo '<td>';
          echo '<input type="radio" name="femalesport" value="' . $row['name'] . '" checked>' ;
          echo '</td>';
          echo '<td>';
          echo $row['name'];
          echo '</td>';
          echo '<td>';
          echo $row['message'];
          echo '</td>';
          echo '<td>';
          echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width:150px; height:170px;">';
          echo '</td>';
          echo '</tr>';
        }
      }
  }

      else {
      $vqueryfemaleleader=$link->query("SELECT * FROM studentdata WHERE email='$studentuser' AND collegehouse='Verte'");
    if(mysqli_num_rows($vquerymaleleader)>0) {
    $queryfv=$link->query("SELECT * FROM candidates WHERE position='VerteFemale' AND approval='yes'");
    if(mysqli_num_rows($queryfv)>0) {
        while ($row=mysqli_fetch_array($queryfv)) {
          echo '<tr>';
          echo '<td>';
          echo '<input type="radio" name="femalesport" value="' . $row['name'] . '" checked>' ;
          echo '</td>';
          echo '<td>';
          echo $row['name'];
          echo '</td>';
          echo '<td>';
          echo $row['message'];
          echo '</td>';
          echo '<td>';
          echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width:150px; height:170px;">';
          echo '</td>';
          echo '</tr>';
        }
      }
  }

       else {
      $bqueryfemaleleader=$link->query("SELECT * FROM studentdata WHERE email='$studentuser' AND collegehouse='Bleue'");
    if(mysqli_num_rows($bquerymaleleader)>0) {
    $queryfb=$link->query("SELECT * FROM candidates WHERE position='BleueFemale' AND approval='yes'");
    if(mysqli_num_rows($queryfb)>0) {
        while ($row=mysqli_fetch_array($queryfb)) {
          echo '<tr>';
          echo '<td>';
          echo '<input type="radio" name="femalesport" value="' . $row['name'] . '" checked>' ;
          echo '</td>';
          echo '<td>';
          echo $row['name'];
          echo '</td>';
          echo '<td>';
          echo $row['message'];
          echo '</td>';
          echo '<td>';
          echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width:150px; height:170px;">';
          echo '</td>';
          echo '</tr>';
        }
      }
  }
}
}
      
?>
</tbody>
</table>

    

<br><hr><br>


<button type="submit" name="submit" value="submit">Vote</button>
</form>


<button class="button5"><a class="whitetextneeded" href='signout.php'> Sign Out </a></button>



</body>
</html>




<?php
echo $output;
?>
