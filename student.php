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
  {?>
    <table class='table' table border= "1px" >

<tr>
            <td><?php echo $row['studentid'];?></td><br>
             <td><?php echo $row['dob'] ;?></td><br>
            <td><?php echo $row['firstname'] ;?> </td><br>
               <td><?php echo $row['lastname'] ;?> </td><br>
                <td><?php echo $row['house'] ;?> </td><br>
                 <td><?php echo $row['town'] ;?> </td><br>
                  <td><?php echo $row['county'] ;?> </td><br>
                   <td><?php echo $row['country'] ;?> </td><br>
                    <td><?php echo $row['postcode'] ;?> </td><br>
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
