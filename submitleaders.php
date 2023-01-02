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
                    if (isset($_POST['submit'])) {
                    $voter=$_POST['voter'];
                    $email2=$_POST['email'];
                    $maleleader=$_POST['maleleader'];
                    $femaleleader=$_POST['femaleleader'];
                    }
                }
            }
        }
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit</title>
</head>
<body>
    <h1 align="center">SUCCESS!</h1>
    <h4>Well done!</h4>

<?php
            if($query){
            $select=$link->query("SELECT * FROM candidates WHERE name='$maleleader'");
            if($select) {
            while($row=mysqli_fetch_array($select)) {
              $m_id=$row['id'];
              $male_name=$row['name'];
              $mposition=$row['position'];
              $mvotes=$row['nvotes'];
            } 
            $add_vote = 1;
            $updated_vote = $mvotes + $add_vote;

            $update=$link->query("UPDATE candidates SET nvotes='$updated_vote' WHERE id='$m_id'");
            if($update) {
              $select2=$link->query("SELECT * FROM candidates WHERE name='$femaleleader'");
              if($select2) {
                while ($row2=mysqli_fetch_array($select2)) {
                  $f_id=$row2['id'];
                  $female_name=$row2['name'];
                  $fpos=$row2['position'];
                  $fvotes=$row2['nvotes'];
                }
                $new_vote2 = 1;
                $updated_vote2 = $fvotes + $new_vote2;
            
            $update2=$link->query("UPDATE candidates SET nvotes='$updated_vote2' WHERE id='$f_id'");

           if($update2) {
             echo '<p>You have voted '. $maleleader. ' as your Male Leader.</p>';
             echo '<p>You have voted '. $femaleleader. ' as your Female Leader.</p>';
             $input=$link->query("UPDATE studentdata SET leadervoted='yes' WHERE id='$id'");

           }
       }
   }
}
}

?>

 <a href="signout.php"><button>Exit the election portal</button></a>