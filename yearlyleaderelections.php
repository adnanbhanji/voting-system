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
$select=$link->query("SELECT * FROM vote_time WHERE electiontype='leader'");
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
        $leadervoted = $row['leadervoted'];
        $collegeyear = $row['collegeyear'];
              
                if($leadervoted == "yes" or $collegeyear == 4){
                    echo '<script>window.location.href="multiplevote.php"</script>';
                }
                //elseif ($collegeyear == 4) {
                  //  echo '<script>window.location.href="multiplevote.php"</script>';
                //}
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
  <title>Yearly Leader Elections</title>
  <link rel="stylesheet" type="text/css" href="vote.css">
</head>
<body>
<br>

<img src="logo_boboto.png" alt="Boboto COllege Logo">
<h1>Yearly Leader Elections</h1>


<br>
<h1 align="center">WELCOME, <?php echo $name; ?></h1>

<p>Select one option for each category. This should be the person you think would be most suitable for that position. Take the decision without using too much influence from peers. Remember that you will not be able to vote after pressing the submit button.</p>

<form method="POST" name="voting" action="submitleaders.php">
<h2>Voter Details</h2>

 Name of Voter: <br><input type="text" readonly value="<?php echo $name; ?>" name="voter"> <br><br>
 Email Address: <br><input type="text" readonly value="<?php echo $email; ?>" name="email"><br>
    
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
    $querymaleleader1=$link->query("SELECT * FROM studentdata WHERE email='$studentuser' AND collegeyear=1");
    if(mysqli_num_rows($querymaleleader1)>0) {
    $querym1=$link->query("SELECT * FROM candidates WHERE position='1MaleLeader' AND approval='yes'");
    if(mysqli_num_rows($querym1)>0) {
        while ($row=mysqli_fetch_array($querym1)) {
          echo '<tr>';
          echo '<td>';
          echo '<input type="radio" name="maleleader" value="' . $row['name'] . '" checked>' ;
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
      $querymaleleader2=$link->query("SELECT * FROM studentdata WHERE email='$studentuser' AND collegeyear=2");
      if(mysqli_num_rows($querymaleleader2)>0) {
      $querym2=$link->query("SELECT * FROM candidates WHERE position='2MaleLeader' AND approval='yes'");
      if(mysqli_num_rows($querym2)>0) {
        while ($row=mysqli_fetch_array($querym2)) {
          echo '<tr>';
          echo '<td>';
          echo '<input type="radio" name="maleleader" value="' . $row['name'] . '" checked>' ;
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
      $querymaleleader3=$link->query("SELECT * FROM studentdata WHERE email='$studentuser' AND collegeyear=3");
      if(mysqli_num_rows($querymaleleader3)>0) {
      $querym3=$link->query("SELECT * FROM candidates WHERE position='3MaleLeader' AND approval='yes'");
      if(mysqli_num_rows($querym3)>0) {
        while ($row=mysqli_fetch_array($querym3)) {
          echo '<tr>';
          echo '<td>';
          echo '<input type="radio" name="maleleader" value="' . $row['name'] . '" checked>' ;
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
    $queryfemaleleader1=$link->query("SELECT * FROM studentdata WHERE email='$studentuser' AND collegeyear=1");
    if(mysqli_num_rows($queryfemaleleader1)>0) {
    $queryf1=$link->query("SELECT * FROM candidates WHERE position='1FemaleLeader' AND approval='yes'");
    if(mysqli_num_rows($queryf1)>0) {
        while ($row=mysqli_fetch_array($queryf1)) {
          echo '<tr>';
          echo '<td>';
          echo '<input type="radio" name="femaleleader" value="' . $row['name'] . '" checked>' ;
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
      $queryfemaleleader2=$link->query("SELECT * FROM studentdata WHERE email='$studentuser' AND collegeyear=2");
      if(mysqli_num_rows($queryfemaleleader2)>0) {
      $queryf2=$link->query("SELECT * FROM candidates WHERE position='2FemaleLeader' AND approval='yes'");
      if(mysqli_num_rows($queryf2)>0) {
        while ($row=mysqli_fetch_array($queryf2)) {
          echo '<tr>';
          echo '<td>';
          echo '<input type="radio" name="femaleleader" value="' . $row['name'] . '" checked>' ;
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
      $queryfemaleleader3=$link->query("SELECT * FROM studentdata WHERE email='$studentuser' AND collegeyear=3");
      if(mysqli_num_rows($queryfemaleleader3)>0) {
      $queryf3=$link->query("SELECT * FROM candidates WHERE position='3FemaleLeader' AND approval='yes'");
      if(mysqli_num_rows($queryf3)>0) {
        while ($row=mysqli_fetch_array($queryf3)) {
          echo '<tr>';
          echo '<td>';
          echo '<input type="radio" name="femaleleader" value="' . $row['name'] . '" checked>' ;
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
