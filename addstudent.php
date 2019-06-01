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

$studentid= mysqli_real_escape_string ($conn, $_POST['studentid'];
 $Password= mysqli_real_escape_string ($conn, $_POST['password']];
 $dob=mysqli_real_escape_string ($conn, $_POST['dob'];
 $firstname= mysqli_real_escape_string ($conn, $_POST['firstname'];
 $lastname= mysqli_real_escape_string ($conn, $_POST['lastname'];
 $house=mysqli_real_escape_string ($conn,  $_POST['house'];
 $town= mysqli_real_escape_string ($conn, $_POST['town'];
 $county= mysqli_real_escape_string ($conn,  $_POST['county'];
 $country= mysqli_real_escape_string ($conn, $_POST['country'];
 $postcode=mysqli_real_escape_string ($conn,  $_POST['postcode'];

$sql= "INSERT INTO student (studentid,password,dob,firstname,lastname, house, town, county, country, postcode)
Values('$studentid','$Password','$dob',' $firstname','$lastname','$house','$town','$county',' $country','$postcode');";
 //ref:https://www.w3schools.com/php/php_mysql_insert.asp

 if(mysqli_query($conn,$sql))
 {
   echo "new Record Created";
 }


}
else
{
 // render the template
//echo template("templates/default.php", $data);
echo templete ("templates/student.php", $data);
}
echo template("templates/partials/footer.php");
header("Location: index.php");
header('Location: index.php?addstudent=success');

?>
