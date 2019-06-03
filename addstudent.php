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
// Build SQL statment that selects a student's database
// Build sql statment that selects all the modules
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous">

  </head>

<body style="padding-top: 100px;" >
<div class= "container">

  <h1>Add New Student</h1>


<form action="" method= "post" role = "form">

<br>
Password:     <input password= "password" name='password'><br>
Date of Birth:<input type= "text" name='dob'> <br>
First Name:    <input type= "text" name='firstname'><br>
Last Name:    <input type= "text" name= 'lastname'><br>
Address:      <input type= "text" name='house' ><br>
Town :        <input type= "text" name= 'town'><br>
County:       <input type= "text" name='county' > <br>
Conutry:      <input type= "text" name= 'country'><br>
Post Code:    <input type= "text" name= 'postcode' ><br>
              <input type= "submit" name="submit" value="Submit Form">
</form>

</div>



<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
 integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
 integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
 integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
 crossorigin="anonymous"></script>


</body>
</html>




<?php

 /*$Password=( $_POST['password']);
 $dob=( $_POST['dob']);
 $firstname=( $_POST['firstname']);
 $lastname= ( $_POST['lastname']);
 $house=(  $_POST['house']);
 $town= ( $_POST['town']);
 $county=  ( $_POST['county']);
 $country=  ( $_POST['country']);
 $postcode=(  $_POST['postcode']);*/

$sql= "INSERT INTO student (password,dob,firstname,lastname, house, town, county, country, postcode)
Values('password','dob',' firstname','lastname','house','town','county',' country','postcode');";
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
