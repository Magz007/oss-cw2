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
