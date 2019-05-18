<?php

$conn = mysqli_connect("localhost", "root", "", "bnu.bseen.co.server");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}


// check logged in
if (isset($_SESSION['id']))
{

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");



 $fristname= $_POST['fristname'];
  $lastname= $_POST['lastname'];
   $dob= $_POST['dob'];
    $house= $_POST['house'];
     $town= $_POST['town'];
      $county= $_POST['county'];
        $country= $_POST['country'];
          $postcode= $_POST['postcode'];


  if (isset($_POST['submit']))
   {
     $sql = "INSERT INTO student (dob, firstname,lastname,house,town,county,country,postcode,)
     values ('$dob','$fristname','$lastname','$house', '$town', ' $county', '$country' ,'$postcode');";

    mysqli_query($conn, $sql);

    header("Location: index.php?addstudent=success");
}
}

 /*else
 {
    // Build a SQL statment to return the student record with the id that
    // matches that of the session variable.
$result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_array($result);
   // render the template
  echo template("templates/default.php", $data);

//}

echo template("templates/partials/footer.php");

}
?>
