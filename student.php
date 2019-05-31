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
$sql = "select * from student;";
$result = mysqli_query($conn,$sql);
$checkresult= mysqli_num_rows($result);
if($checkresult >0 )
{
  while ($row =mysqli_fetch_array($result))
  {
    echo $row['studentid'] ;
  }
}
?>

  <html>
  <head> Student Records </head>
  <body style="padding-top: 100px;" >
  <div class= "container">
        <table class='table' table border= "1px">
          <tr>
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
<?php
               // Display a number at the beginging for the table
$sr=1;
while($row = mysqli_fetch_array($result))
{?>
    <tr>
    <form action="" method= "post" role = "form">
            <td><?php echo $row[$sr] ;?> </td>
            <td><?php echo $row['password'] ;?> </td>
             <td><?php echo $row['dob'] ;?> </td>
              <td><?php echo $row['firstname'] ;?> </td>
               <td><?php echo $row['lastname'] ;?> </td>
                <td><?php echo $row['house'] ;?> </td>
                 <td><?php echo $row['town'] ;?> </td>
                  <td><?php echo $row['county'] ;?> </td>
                   <td><?php echo $row['country'] ;?> </td>
                    <td><?php echo $row['postcode'] ;?> </td>
                     <td> <input type= "checkbox" name= "records" value=<?php echo $row['studentid'] ;?> required></td>
                      <td> <input type="submit" name="submit" value="DELETE"></td>
  </form>
     </tr>
}
<?php $sr++;



    /*Codes the delete button
     if (isset($_POST['submit']))
     {
       while($st )

         $st=$_POST['records']

      $sql= ("Delete * from student where studentid =$_POST['studentid'];";

      mysqli_query($conn,$sql);
     }

     mysqli_close($conn);
}
}*/
}
else
{
 // render the template
 echo template("templates/partials/footer.php");
 header("Location: index.php?");

}
echo template("templates/default.php", $data);
    $data['content'] .= "</table>";

?>


</div>
</body>
</html>
