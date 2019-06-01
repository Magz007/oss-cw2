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
$sql = "select * from student; ";
$result = mysqli_query($conn, $sql);
$checkresult=mysqli_num_rows($result);
if($checkresult>0)
{
  while($row= mysqli_fetch_assoc($result))
  {
    echo  $row['studentid']. "<br>";
      echo  $row['password']. "<br>";
        echo  $row['dob']. "<br>"
          echo  $row['fristname']. "<br>";
            echo  $row['$lastname']. "<br>";
              echo  $row['$house']. "<br>";
                echo  $row['county']. "<br>";
                  echo  $row['country']. "<br>";
                    echo  $row['postcode']. "<br>";
  }
}

}
else
{
  header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
