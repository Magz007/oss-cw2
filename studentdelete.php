<?php> $rn ++;

    if (isset($_POST['submit']))
      {
     $i=0;
     $keyToDelete=$_row['records[]'];
      while ($i<$keyToDelete)
      {
        $sql = "Delete * from student where studentid='". $_SESSION['id'] . "';";
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
$rn=1;
// Display the mstudent details
while($row = mysqli_fetch_array($result)<0)
{?>
     <form action="addstudent.php" method= "post" role = "form">
    <tr>
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
