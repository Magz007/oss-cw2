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
Address:<input type= "text" name="house"> <br><br>
Town :<input type= "text" name="town"> <br><br>
County: <input type= "text" name="county"> <br><br>
Conutry: <input type= "text" name="counrty"> <br><br>
Post Code: <input type= "text" name="postCode"> <br><br>
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
    $sql = "INSERT INTO student  ("firstname ='" . $_POST['txtfirstname'] . "',")";
    $sql .= "INSERT INTO student lastname ='" . $_POST['txtlastname']  . "',";
    $sql .= "house ='" . $_POST['txtdob']  . "',";
    $sql .= "1stLineAddress ='" . $_POST['txthouse']  . "',";
    $sql .= "Town ='" . $_POST['txttown']  . "',";
    $sql .= "County ='" . $_POST['txtcounty']  . "',";
    $sql .= "Country ='" . $_POST['txtcountry']  . "',";
    $sql .= "Postcode ='" . $_POST['txtpostcode']  . "' ";
    $sql .= "where studentid = '" . $_SESSION['id'] . "';";
    $result = mysqli_query($con,$sql);

    $data['content'] = "<p>Inserted</p>";




 }
 else
 {
    // Build a SQL statment to return the student record with the id that
    // matches that of the session variable.
    $sql = "select * from student where studentid='". $_SESSION['id'] . "';";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);



   // render the template
   echo template("templates/default.php", $data);

}
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
