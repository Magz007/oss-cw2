<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");
//include("css/index.html");
//include("js/index.html")
// check logged in
if (isset($_SESSION['id']))
 {
  echo template("templates/partials/header.php");
  echo template("templates/partials/nav.php");

$studentid=$_POST['studentid'];
 $Password=$_POST['password'];
 $dob=$_POST['dob'];
 $firstname=$_POST['$firstname'];
 $lastname=$_POST['lastname'];
 $house=$_POST['house'];
 $town=$_POST['town'];
 $county= $_POST['county'];
 $country=$_POST['country'];
 $postcode=$_POST['postcode'];

$sql= "INSERT INTO student (studentid,password,dob,firstname,lastname, house, town, county, country, postcode)
Values('$studentid','$Password','$dob',' $firstname','$lastname','$house','$town','$county',' $country','$postcode');";
 //ref:https://www.w3schools.com/php/php_mysql_insert.asp
 mysqli_query($conn,$sql)


}
else
{
 // render the template
//echo template("templates/default.php", $data);
echo templete ("templates/student.php", $data);
}
echo template("templates/partials/footer.php");
header("Location: index.php");

?>
