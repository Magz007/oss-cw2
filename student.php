<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id']))
    {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects a student's database
    mysqli_query ("select * from student  where studentid =  '" . $_SESSION['id'] ."';";)
    $result = mysqli_query($conn,$sql);
?>
<html>
<head> Student Records </head>
<body style="padding-top: 100px;" >
<div class= "container">

  <table class='table' table border= "1px">
    <tr>
      <th> </th>
       <th>Student ID</th>
        <th>First Name</th>
         <th>Last Name</th>
          <th>D.O.B</th>
           <th>1st Line Address</th>
            <th>Town</th>
             <th>County</th>
              <th>Country</th>
               <th>Post Code</th>
                <th> Select Checkbox </th>

     </tr>
<?php
      // Display a number at the beginging for the table
    $sr=1;

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
                     <td> <input type= "checkbox" name= "records[]" value=<?php echo $row['studentid'] ;?> required></td>
                      <td> <input type= "submit" name="btndelete" value="DELETE" class= "btn btn-info"> </td>
  </form>
     </tr>


    <?php $sr ++ ;}?>


    <?php
    // Codes the delete button
    if (isset($_POST['btndelete']))
    {
        $i=0;
        $keyToDelete=$_POST['records[]'][$i];

    foreach ($keyToDelete as ['btndelete'])
      {
        mysql_query("Delete * from student where studentid='". $_POST['id'] . "';"; )
        $result = mysqli_query($conn,$sql);


        $i++;
      }



    /*if(isset($_POST ['submitDeleteBtn']))
     {
       $key= $_POST['btndelete'];
       $result=mysqli_query($link,"SELECT * from test where id='$key'");
       if (mysqli_num_rows($result)>0)
       {
         $queryDelete=mysqli_query($link,"DELETE * from test where id = '$key'");
       }
     }
*/
  ?>

 <?php

      $data['content'] .= "</table>";

      // render the template
      echo template("templates/default.php", $data);

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
