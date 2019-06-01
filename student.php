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

  ?>

    <div class= "container">
      <table class="table table-bordered">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Student Number</th>
          <th scope="col">D.O.B</th>
          <th scope="col">Fisrt Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">1st Line Address</th>
          <th scope="col">Town</th>
          <th scope="col">County</th>
          <th scope="col">Country</th>
          <th scope="col">PostCode</th>

        </tr>
        <?php

    if($checkresult>0)
    {
          $sr=1;
        while($row= mysqli_fetch_assoc($result))
        {?>
</thead>
      <tbody>
    <tr>
      <td><?php echo $sr;?> </td>
      <td><?php echo $row['studentid'];?> </td>
       <td><?php echo $row['dob'] ;?> </td>
       <td><?php echo $row['firstname'];?> </td>
         <td><?php echo $row['lastname'] ;?> </td>
          <td><?php echo $row['house'] ;?> </td>
           <td><?php echo $row['town'] ;?> </td>
            <td><?php echo $row['county'] ;?> </td>
             <td><?php echo $row['country'] ;?> </td>
              <td><?php echo $row['postcode'] ;?> </td>
    </tr>
  </tbody>



</table>
</div>
}
<?php $sr ++  ;?>

<?php

}
}
else
{
  header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
