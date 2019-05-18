<?php

session_start();
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// check logged in
if (isset($_SESSION['id']))
{
   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

 $fristname=$_POST['fristname'];
  $lastname=$_POST['lastname'];
   $dob= $_POST['dob'];
    $house= $_POST['house'];
     $town= $_POST['town'];
      $county= $_POST['county'];
        $country= $_POST['country'];
          $postcode= $_POST['postcode'];

  if (isset($_POST['submit']))
   {
     $sql = "INSERT INTO student values('" .  $_SESSION['id'] . "','" . $_POST['firstname'] . "');";




      /*(dob, firstname,lastname,house,town,county,country,postcode,)
     values ('$dob','$fristname','$lastname','$house', '$town', ' $county', '$country' ,'$postcode');";*/

    mysqli_query($conn, $sql);

    header("Location: index.php?addstudent=success");
}
}
 else
 {

$result = mysqli_query($conn,$sql);
 $row =mysqli_fetch_array($result);
   // render the template
  echo template("templates/default.php", $data);
//
}
echo template("templates/partials/footer.php");
}
?>
