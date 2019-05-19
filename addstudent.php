<?php
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
     $sql = "insert into student values('" .  $_SESSION['id'] . "','$dob','$fristname','$lastname','$house', '$town', ' $county', '$country' ,'$postcode');";
      mysqli_query($conn, $sql);

      if (!mysql_query($sql,$con))
  {
      die('Error: ' . mysql_error());
  }
  echo "1 record added";

  $data['content'] .=  . $_POST['submit'] .;


}

}
 else
 {

$result = mysqli_query($conn,$sql);
 $row =mysqli_fetch_array($result);
   // render the template
  echo template("templates/default.php", $data);
  header("Location: index.php?addstudent=success");
//
}
echo template("templates/partials/footer.php");

?>
