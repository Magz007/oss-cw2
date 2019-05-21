<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// check logged in
if (isset($_SESSION['id']))
{
   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");
?>

<html>
<head> Add New Student  </head>
<body style="padding-top: 100px;" >
<div class= "container">

<form action="" method= "post" role = "form">
<br>

FirstName:    <input type= "text" name='firstname' <br><br>
Last Name:    <input type= "text" name= 'lastname'<br><br>
Date of Birth:<input type= "text" name= 'dob'  <br><br>
Address:      <input type= "text" name='house' <br><br>
Town :        <input type= "text" name= 'town'<br><br>
County:       <input type= "text" name='county'  <br><br>
Conutry:      <input type= "text" name= 'country'<br><br>
Post Code:    <input type= "text" name= 'postcode' <br><br>
             <button type= "submit" name="submit" value="SUBMIT" class= "btn btn-info"></button>
</form>

<?php

 /*$fristname=$_POST['fristname'];
 $lastname=$_POST['lastname'];
 $dob= $_POST['dob'];
 $house=$_POST['house'];
 $town=$_POST['town'];
 $county= $_POST['county'];
 $country=$_POST['country'];
 $postcode=$_POST['postcode'];*/

if (isset($_POST['submit']))
{
$sql = "insert into student(dob,firstname,lastname,house,town,county,country,postcode)
 values('$firstname','$lastname','$dob','$house, '$town', ' $county', '$country' ,'$postcode');";

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
}
echo template("templates/partials/footer.php");

?>

</div>
</body>
</html>
