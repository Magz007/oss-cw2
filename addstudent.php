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
 /*$dob= $_POST['dob'];
 $fristname=$_POST['fristname'];
 $lastname=$_POST['lastname'];
 $house=$_POST['house'];
 $town=$_POST['town'];
 $county= $_POST['county'];
 $country=$_POST['country'];
 $postcode=$_POST['postcode'];*/

if (isset($_POST['submit']))
{
$sql = "insert into student(dob,firstname,lastname,house,town,county,country,postcode)
 values(
   '{ $mysqli->real_escape_string ($_POST['dob'])}',
    '{ $mysqli->real_escape_string ($_POST['fristname'])}',
      '{ $mysqli->real_escape_string ($_POST['lastname'])}',
        '{ $mysqli->real_escape_string ($_POST['house'])}',
          '{ $mysqli->real_escape_string ($_POST['town'])}',
            '{ $mysqli->real_escape_string ($_POST['county'])}',
              '{ $mysqli->real_escape_string ($_POST['conutry'])}',
                '{ $mysqli->real_escape_string ($_POST['postcode'])}',
   );";

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
