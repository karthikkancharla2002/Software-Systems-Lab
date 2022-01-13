<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $conn = new mysqli("localhost","root","","publications");
    if($conn->connect_error)
    {
      die("Connection failed: " . $conn->connect_error);
    }
    if(@$_POST['delrecords'])
    {

      $aut = $_POST['aut'];
      $pub = $_POST['pub'];
      $sqldel = "DELETE FROM authors WHERE author = '$aut' and publisher = '$pub'";
      if ($conn->query($sqldel) === TRUE) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . $conn->error;
    }
    }
    if(@$_POST['delrecords2'])
    {

      $titl = $_POST['titl'];
      $auti = $_POST['auti'];
      $yr = $_POST['yr'];
      $sqldel = "DELETE FROM titles WHERE title = '$titl'";
      if ($conn->query($sqldel) === TRUE) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . $conn->error;
    }
    }




     ?>
  </body>
</html>
