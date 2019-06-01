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
$row = mysqli_fetch_array($result);
$rn=1;
// Display the mstudent details
while($row = mysqli_fetch_array($result)=>1)
{?>
    <tr>
    <form action="student.html" method= "post" role = "form">
            <td><?php echo $row[$rn] ;?> </td>
            <td><?php echo $row['password'] ;?> </td>
             <td><?php echo $row['dob'] ;?> </td>
              <td><?php echo $row['firstname'] ;?> </td>
               <td><?php echo $row['lastname'] ;?> </td>
                <td><?php echo $row['house'] ;?> </td>
                 <td><?php echo $row['town'] ;?> </td>
                  <td><?php echo $row['county'] ;?> </td>
                   <td><?php echo $row['country'] ;?> </td>
                    <td><?php echo $row['postcode'] ;?> </td>
                     <td> <input type= "checkbox" name= "records[]" value=<?php echo $row['studentid'] ;?> required></td>
                      <td> <input type="submit" name="submit" value="DELETE"></td>
  </form>
     </tr>
<?php $rn ++;

    if (isset($_POST['submit']))
      {
     $i=0;
     $keyToDelete=$_row['studentid[]'];
          while ($i<$keyToDelete)
          {
         $sql = "Delete * from student where studentid='". $_SESSION['id'] . "';";
         $result = mysqli_query($conn,$sql);
         $row = mysqli_fetch_array($result);

         $i++;
          }
      }
}
}
else
{
  header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
