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
      <th>Select</th>
      </tr>";

?>

<?php> $sr=1;
     while($row = mysqli_fetch_array($result))
{?>

  <tr>
    <form action="" method= "post" role = "form">
  <td><?php echo $sr ;?> </td>
  <td><?php echo $row['studentid'] ;?> </td>
    <td><?php echo $row['firstname'] ;?> </td>
      <td><?php echo $row['lastname'] ;?> </td>
       <td><?php echo $row['dob'] ;?> </td>
        <td><?php echo $row['house'] ;?> </td>
          <td><?php echo $row['town'] ;?> </td>
           <td><?php echo $row['county'] ;?> </td>
           <td><?php echo $row['country'] ;?> </td>
             <td><?php echo $row['postcode'] ;?> </td>

        <td> <input type= "checkbox" name= "btndelete" value=<?php echo $row['checkbox'] ;?> required></td>
        <td> <input type= "submit" name="submitDeleteBtn" class-= "btn btn-info">  </td>
     </form>
</tr>;

}
<?php

      $data['content'] .= "</table>";

      // render the template
      echo template("templates/default.php", $data);

  }
    else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
