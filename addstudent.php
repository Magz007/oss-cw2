<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id']))
{

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   if(!mysqli_select_db($conn,$sql))
   {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     die();
   }

?>

   <html>
   <head> Add New Student  </head>
   <body style="padding-top: 100px;" >
   <div class= "container">

<form action="addstudent.php" method= "post" role = "form">
<br>

FirstName:    <input type= "text" name="fristname"> <br><br>
Last Name:    <input type= "text" name="lastname">  <br><br>
Date of Birth:<input type= "text" name="dob">       <br><br>
Address:      <input type= "text" name="house">     <br><br>
Town :        <input type= "text" name="town">      <br><br>
County:       <input type= "text" name="county">    <br><br>
Conutry:      <input type= "text" name="counrty">   <br><br>
Post Code:    <input type= "text" name="postcode">  <br><br>

<input type= "submit" name="insert "value= "SUBMIT">

</form>

<?php
 if (isset($_POST['insert']))
 {
    $sql = "insert into student (firstname) values ('" . $_POST['firstname'] . "');";
    $sql = "insert into student lastname values ('" .  $_SESSION['id'] . "','" . $_POST['lastname'] . "');";
    $sql = "house ='" . $_POST['txtdob']  . "',";
    $sql .= "1stLineAddress ='" . $_POST['txthouse']  . "',";
    $sql .= "Town ='" . $_POST['txttown']  . "',";
    $sql .= "County ='" . $_POST['txtcounty']  . "',";
    $sql .= "Country ='" . $_POST['txtcountry']  . "',";
    $sql .= "Postcode ='" . $_POST['txtpostcode']  . "' ";
    $sql .= "where studentid = '" . $_SESSION['id'] . "';";
    $result = mysqli_query($con,$sql);

    $data['content'] = "<p>Inserted</p>";

  $result = mysqli_query($conn, $sql);

}

 //else
 //{
    // Build a SQL statment to return the student record with the id that
    // matches that of the session variable.
  //  $sql = "select * from student where studentid='". $_SESSION['id'] . "';";
  //  $result = mysqli_query($conn,$sql);
  //  $row = mysqli_fetch_array($result);



   // render the template
  // echo template("templates/default.php", $data);

//}
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
