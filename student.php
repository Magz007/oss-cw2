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
$checkresult=mysqli_num_rows($result);
if($checkresult>0)
{
  while($row= mysqli_fetch_assoc($result))
  {?>
<table table class='table' table border= "1px">
<tr>
            <td><?php echo $row['studentid'];?>
             <?php echo $row['dob'] ;?>
            <?php echo $row['firstname'] ;?> </td>
               <td><?php echo $row['lastname'] ;?> </td>
                <td><?php echo $row['house'] ;?> </td>
                 <td><?php echo $row['town'] ;?> </td>
                  <td><?php echo $row['county'] ;?> </td>
                   <td><?php echo $row['country'] ;?> </td>
                    <td><?php echo $row['postcode'] ;?> </td>
                  </tr>
</table>
<?php
  }
}

}
else
{
  header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
