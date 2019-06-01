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
    <th>Number</th>
    <th>Password</th>
     <th>D.O.B</th>
      <th>First Name</th>
       <th>Last Name</th>
         <th>1st Line Address</th>
          <th>Town</th>
           <th>County</th>
            <th>Country</th>
             <th>Post Code</th>

         </tr>
    <tr>
           <td><?php echo $row['studentid'];?> <td>
            <td><?php echo $row['password'] ;?> </td>
             <td><?php echo $row['dob'] ;?> </td>
              <td><?php echo $row['firstname'] ;?> </td>
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
