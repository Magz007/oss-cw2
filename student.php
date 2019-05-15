<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects a student's modules
      $sql = "select * from student  where studentid =  '" . $_SESSION['id'] ."';";

      $result = mysqli_query($conn,$sql);

      // prepare page content
      $data['content'] .= "<table border='1'>";
      $data['content'] .= "<tr><th colspan='5' align='center'>Student Records</th></tr>";
      $data['content'] .= "<tr>
      <th>Student ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>D.O.B</th>
      <th>1st Line Address</th>
      <th>Town</th>
      <th>County</th>
      <th>Country</th>
      <th>Post Code</th>

      </tr>";


      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr>
         <td> $row[studentid] </td>
         <td> $row[firstname] </td>
         <td> $row[lastname] </td>
         <td> $row[dob] </td>
         <td> $row[house] </td>
         <td> $row[town] </td>
         <td> $row[county] </td>
         <td> $row[counrty] </td>
         <td> $row[postcode] </td>
         </tr>";

      }
      $data['content'] .= "</table>";

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
