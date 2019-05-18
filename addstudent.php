<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

  $db_seclected= mysqli_select_db(student,include(_includes/dbconnect.inc); 
  if(!$db_seclected)
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
  }
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
1st Line Address:<input type= "text" name="1st Line Address"> <br><br>
Town :<input type= "text" name="Town"> <br><br>
County: <input type= "text" name="County"> <br><br>
Conutry: <input type= "text" name="Counrty"> <br><br>
Post Code: <input type= "text" name="Post Code"> <br><br>
<input type= "Submit" name ="input" Value= "Submit">
</form>

<?php
$value= $_POST['fristname'];
$sql = "insert into student values ('" .  $_SESSION['id'] . "','" . $_POST['firstname'] . "');";
$value= $_POST['lastname'];
$sql = "insert into student values ('" .  $_SESSION['id'] . "','" . $_POST['firstname'] . "');";
$value= $_POST['dob'];
$sql = "insert into student values ('" .  $_SESSION['id'] . "','" . $_POST['firstname'] . "');";
$value= $_POST['1st Line Address'];
$sql = "insert into student values ('" .  $_SESSION['id'] . "','" . $_POST['firstname'] . "');";
$value= $_POST['Town'];
$sql = "insert into student values ('" .  $_SESSION['id'] . "','" . $_POST['firstname'] . "');";
$value= $_POST['county'];
$sql = "insert into student values ('" .  $_SESSION['id'] . "','" . $_POST['firstname'] . "');";
$value= $_POST['Country'];
$sql = "insert into student values ('" .  $_SESSION['id'] . "','" . $_POST['firstname'] . "');";
$value= $_POST['Post code'];
$sql = "insert into student values ('" .  $_SESSION['id'] . "','" . $_POST['firstname'] . "');";

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
