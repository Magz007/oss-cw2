<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");


 $dob=$_POST['dob'];
 $fristname=$_POST['fristname'];
 $lastname=$_POST['lastname'];
 $house=$_POST['house'];
 $town=$_POST['town'];
 $county= $_POST['county'];
 $country=$_POST['country'];
 $postcode=$_POST['postcode'];

$sql= "INSERT INTO student (dob,firstname,lastname, house, town, county, country, postcode)
Values('$studentid','$dob',' $fristname','$lastname','$house','$town','$county',' $country','$postcode')";


 //ref:https://www.w3schools.com/php/php_mysql_insert.asp
if (mysqli_query($conn,$sql))
{
    echo "New record created successfully";
}

}
else
{

 // render the template
echo template("templates/default.php", $data);
}
echo template("templates/partials/footer.php");
header("Location: index.php?addstudent=success");
?>
