<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");
   include("css/index.html");

   // check logged in
if (isset($_SESSION['id']))
{
      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");
// Build SQL statment that selects a student's database
// Build sql statment that selects all the modules
$sql = "select * from student where studentid='". $_SESSION['id'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result
echo $row=['studentid'].'<br>';

}
else
{
  header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
