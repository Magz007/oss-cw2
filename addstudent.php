<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id']))
{

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

$con = mysqli_connect("localhost", "root", "", "");
?>

   <html>
   <head> Add New Student  </head>
   <body style="padding-top: 100px;" >
   <div class= "container">

<form action="" method= "post" role = "form">
<br>

First Name  :<input type= "text" name="fristname"> <br><br>
Last Name:   <input type= "text" name="lastname"> <br><br>
Date of Birth:<input type= "float" name="dob"> <br><br>
1st Line Address:<input type= "text" name="1stLineAddress"> <br><br>
Town :<input type= "text" name="Town"> <br><br>
County: <input type= "text" name="County"> <br><br>
Conutry: <input type= "text" name="Counrty"> <br><br>
Post Code: <input type= "text" name="PostCode"> <br><br>
<input type= "submit" Value= "INSERT">
</form>

<?php

 if(!mysqli_select_db($con, 'bnu.bseen.co.server'))
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   die();
 }

$fristname = $_POST['fristname'];
$lastname= $_POST['lastname'];
$dob= $_POST['dob'];
$lineaddress= $_POST['1stLineAddress'];
$town= $_POST['Town'];
$county= $_POST['County'];
$country= $_POST['Country'];
$postcode= $_POST['Postcode'];

$sql = "insert into student ('firstname','lastname','dob','house','town','county','country','postcode')
values ('$fristname','$lastname','$dob','$lineaddress','$town','$county','$conutry','$postcode')";



   // render the template
   echo template("templates/default.php", $data);

}
else
 {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
</div>
</body>
</html>
