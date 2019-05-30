<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

?>

<html>
<head> Add New Student  </head>
<body style="padding-top: 100px;" >
<div class= "container">

<form action="" method= "post" role = "form">

<br>
Date of Birth:<input type= "text" name= 'dob'> <br><br>
FirstName:    <input type= "text" name='firstname' ><br><br>
Last Name:    <input type= "text" name= 'lastname'><br><br>
Address:      <input type= "text" name='house' ><br><br>
Town :        <input type= "text" name= 'town'><br><br>
County:       <input type= "text" name='county' > <br><br>
Conutry:      <input type= "text" name= 'country'><br><br>
Post Code:    <input type= "text" name= 'postcode' ><br><br>
              <input type= "submit" name="submit" value="Submit Form">
</form>

<?php
 $studentid=$_POST['studentid'];
 $dob=$_POST['dob'];
 $fristname=$_POST['fristname'];
 $lastname=$_POST['lastname'];
 $house=$_POST['house'];
 $town=$_POST['town'];
 $county= $_POST['county'];
 $country=$_POST['country'];
 $postcode=$_POST['postcode'];

$sql= "INSERT INTO student (studentid,dob,firstname,lastname, house, town, county, country, postcode)
Values('$studentid','$dob','$firstname','$lastname','$house','$town','$county',' $country','$postcode')";
//mysqli_query($conn, $sql);

 //ref:https://www.w3schools.com/php/php_mysql_insert.asp
if (mysqli_query($conn,$sql))
{
    echo "New record created successfully";
}

else
{

   // render the template
echo template("templates/default.php", $data);
}
echo template("templates/partials/footer.php");
header("Location: index.php?addstudent=success");
?>

</div>
</body>
</html>
