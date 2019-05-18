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

FirstName  :<input type= "text" name="fristname"> <br><br>
Last Name:   <input type= "text" name="lastname"> <br><br>
Date of Birth:<input type= "float" name="dob"> <br><br>
Address:<input type= "text" name="1stLineAddress"> <br><br>
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

 if (isset($_POST['submit']))
  {

    // build an sql statment to update the student details
    $sql = "update student set firstname ='" . $_POST['txtfirstname'] . "',";
    $sql .= "lastname ='" . $_POST['txtlastname']  . "',";
    $sql .= "house ='" . $_POST['txthouse']  . "',";
    $sql .= "town ='" . $_POST['txttown']  . "',";
    $sql .= "county ='" . $_POST['txtcounty']  . "',";
    $sql .= "country ='" . $_POST['txtcountry']  . "',";
    $sql .= "postcode ='" . $_POST['txtpostcode']  . "' ";
    $sql .= "where studentid = '" . $_SESSION['id'] . "';";
    $result = mysqli_query($conn,$sql);

    $data['content'] = "<p>Your details have been updated</p>";

 }
 else if
 {
    // Build a SQL statment to return the student record with the id that
    // matches that of the session variable.
    $sql = "select * from student where studentid='". $_SESSION['id'] . "';";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);



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
