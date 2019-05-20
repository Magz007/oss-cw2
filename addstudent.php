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

<form action="" method= "post">
<br>

FirstName:    <input type= "text" name=<?php $_POST['fristname'];?>> <br><br>
Last Name:    <input type= "text" name=<?php $_POST['lastname'];?>> <br><br>
Date of Birth:<input type= "text" name=<?php $_POST['dob'];?>>   <br><br>
Address:      <input type= "text" name=<?php $_POST['house'];?>>  <br><br>
Town :        <input type= "text" name=<?php $_POST['town'];?>> <br><br>
County:       <input type= "text" name=<?php $_POST['county'];?>>  <br><br>
Conutry:      <input type= "text" name=<?php $_POST['country'];?>>  <br><br>
Post Code:    <input type= "text" name=<?php $_POST['postcode'];?>>  <br><br>
             <button type= "submit" name="submit" value="SUBMIT" class= "btn btn-info"></button>
</form>

<?php


if (isset($_POST['submit']))
{
$sql = "insert into student(dob,firstname,lastname,house,town,county,country,postcode)
 values('firstname','lastname','dob','house, 'town', ' county', 'country' ,'postcode');";

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
