<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");
  // include("css/index.html");

   // check logged in
if (isset($_SESSION['id']))
{
      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");
// Build SQL statment that selects a student's database
// Build sql statment that selects all the modules


$sql = "select * from student; ";
$result = mysqli_query($conn, $sql);

$data['content'] .= "<table  class='table' table border= '2px'>";
$data['content'] .= "<tr>
<th>Student ID</th>
<th>D.O.B</th>
<th>First Name</th>
<th>Last Name</th>
<th>1st Line Address</th>
<th>Town</th>
<th>County</th>
<th>Counrty</th>
<th>Post Code</th>
<th>Check</th>
</tr>";

while ($row= mysqli_fetch_array($result))
{
  $data['content'] .= "<tr>

  <td>$row[studentid]</td>
  <td>$row[dob]</td>
  <td>$row[firstname]</td>
  <td>$row[lastname]</td>
  <td>$row[house]</td>
  <td>$row[town]</td>
  <td>$row[county]</td>
  <td>$row[country]</td>
  <td>$row[postcode]</td>
  <td> <input type= checkbox  name=checkbox  value= $row['ID']> required></td>


  </tr>";
}
  $data['content'] .= "</table>";

  echo template("templates/default.php", $data);

 }
 else
 {
  header("Location: index.php");
 }

 echo template("templates/partials/footer.php");

 ?>
