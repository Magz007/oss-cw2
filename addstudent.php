<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id']))
{

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

$studentid=$_POST["studentid"];
$password= $_POST["password"];
 $fristname= $_POST['fristname'];
  $lastname= $_POST['lastname'];
   $dob= $_POST['dob'];
    $house= $_POST['house'];
     $town= $_POST['town'];
      $county= $_POST['county'];
        $country= $_POST['country'];
          $postcode= $_POST['postcode'];


     $sql = "INSERT INTO student (studentid, password,firstname, lastname,dob,house,town,county,country,postcode,)
     values ('$studentid','$password','$fristname','$lastname','$dob','$house', '$town', '  $county', '  $country' ,' $postcode');";

    $result = mysqli_query($conn, $sql);

    header("./Location: index.php? addstudent= success");
}
 else
 {
    // Build a SQL statment to return the student record with the id that
    // matches that of the session variable.
 $sql = "select * from student where studentid='". $_SESSION['id'] . "';";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_array($result);
   // render the template
  echo template("templates/default.php", $data);

}




echo template("templates/partials/footer.php");

?>
