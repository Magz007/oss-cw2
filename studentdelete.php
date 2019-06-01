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
?>
<html>
<head> Delete Record </head>
<body style="padding-top: 100px;" >
<div class= "container">
<table class='table' table border= "5px">
  <?php
$sql = "select * from student; ";
$result = mysqli_query($conn, $sql);

?>
<tr>
<th>#</th>
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
<th>Submit </th>
</tr>

<?php
$sr=1;
while($row= mysqli_fetch_assoc($result))
{  ?>
    <tr>
    <form action="" method= "post" role = "form">
      <td><?php echo $sr ;?> </td>
      <td><?php echo $row['studentid'] ;?> </td>
      <td><?php echo $row['dob'] ;?> </td>
      <td><?php echo $row['firstname'] ;?> </td>
      <td><?php echo $row['lastname'] ;?> </td>
      <td><?php echo $row['house'] ;?> </td>
      <td><?php echo $row['town'] ;?> </td>
      <td><?php echo $row['county'] ;?> </td>
      <td><?php echo $row['country'] ;?> </td>
      <td><?php echo $row['postcode'] ;?> </td>
      <td> <input type= "checkbox" name= "checkbox" value=<?php echo $row['studentid'] ;?> required></td>
      <td> <input type= "submit" name="submit" value="Delete" class-= "btn btn-info">  </td>
     </form>
</tr>
<?php
 $sr ++ ;
 $data['content'] .= "</table>";
}
?>
<?php
    if (isset($_POST['submit']))
      {
     $i=0;
     $keyToDelete=$_row['checkbox'];
      while ($i<$keyToDelete)
      {
        $sql = "Delete * from student where studentid='". $_SESSION['id'] . "'; ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        $i++;
      }
      }
}

else
{
  header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
</table>
</div>
</body>
</html>
