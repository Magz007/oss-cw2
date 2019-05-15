<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

?>


<html>
<head> Student Record </head>
<body style="padding-top: 100px;" >
<div class= "container">

  <?php

 if(isset($_POST ['submitDeleteBtn']))
 {
   $key= $_POST['btndelete'];
   $result=mysqli_query($link,"SELECT * from student where id='$key'");
   if (mysqli_num_rows($result)>0)
   {
     $queryDelete=mysqli_query($link,"DELETE * from test where id = '$key'");
   }
 }
   ?>

  <table class='table' table border= "5px">
  <tr>
  <th> Student ID </th>
    <th> First Name</th>
      <th> Last Name </th>
        <th> D.O.B </th>
          <th> 1st Line Address</th>
           <th> Town</th>
            <th> County</th>
             <th> Country</th>
              <th>Post Code</th>
  </tr>

  <?php
$sr=1;
while($row= mysqli_fetch_array($fetchQuery))
{
  ?>
  <tr>
    <form action="" method= "post" role = "form">
  <td><?php echo $sr ;?> </td>
  <td><?php echo $row['name'] ;?> </td>
    <td><?php echo $row['email'] ;?> </td>
      <td><?php echo $row['phone_Number'] ;?> </td>
        <td> <input type= "checkbox" name= "btndelete" value=<?php echo $row['ID'] ;?> required></td>
        <td> <input type= "submit" name="submitDeleteBtn" class-= "btn btn-info">  </td>
     </form>
</tr>
<?php $sr ++ ;}
?>
    </table>
</div>
</body>
</html>
