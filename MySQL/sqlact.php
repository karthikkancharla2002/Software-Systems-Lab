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


    if (@$_POST['disprecords'])
    {
      echo "Records in the authors table are: <br><br>";
        $sql = "SELECT author, publisher FROM authors";
        $result = $conn->query($sql);
        if($result->num_rows > 0)
        {
          while($row = $result->fetch_assoc())
          {
            echo "Author: " . $row["author"] . " " . "Publisher: " . $row["publisher"];
            $aut = $row["author"];
            $pub = $row["publisher"];
            ?>
            <form action="sqlact2.php" method="post">
              <input type="text" name="aut" value='<?php echo "$aut" ?>' hidden>
              <input type="text" name="pub" value='<?php echo "$pub" ?>' hidden>
              <input type="submit" name="delrecords" value="Delete">
            </form>

            <?php
            echo "<br>";
          }
        }
        else {
          echo "No records added yet";
        }
        echo "<br>";
        echo "Records in the titles table are: <br><br>";
        $sql2 = "SELECT title, author, year FROM titles";
        $result2 = $conn->query($sql2);
        if($result2->num_rows > 0)
        {
          while($row = $result2->fetch_assoc())
          {
            echo "Title: " . $row["title"] . " " . "Author: " .  $row["author"]. " " . "Year: " . $row["year"];
            $titl = $row["title"];
            $author = $row["author"];
            $yr = $row["year"];
            ?>
            <form action="sqlact2.php" method="post">
              <input type="text" name="titl" value='<?php echo "$titl" ?>' hidden>
              <input type="text" name="auti" value='<?php echo "$auti" ?>' hidden>
              <input type="text" name="yr" value='<?php echo "$yr" ?>' hidden>
              <input type="submit" name="delrecords2" value="Delete">
            </form>

            <?php
            echo "<br>";
          }
        }
    }
    if (@$_POST['add'])
    {

      $auth = @$_POST['auth'];
      $publisher = @$_POST['publisher'];

if(is_string($auth) && is_string($publisher))
{
      $sql = "INSERT INTO authors (author,publisher) VALUES ('$auth','$publisher')";

      if ($conn->query($sql) === TRUE) {
  echo "New record added successfully";
  } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
else {
  echo "Entered values are not a string";
}

$conn->close();
    }
    if (@$_POST['addtitle'])
    {

      $title = @$_POST['title'];
      $auth = @$_POST['auth'];
      $year = @$_POST['year'];

if(is_string($title) && is_string($auth) && is_string($year))
{
      $sql = "INSERT INTO titles (title,author,year) VALUES ('$title','$auth','$year')";

      if ($conn->query($sql) === TRUE) {
  echo "New record added successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
    }
if (@$_POST['aypb'])
{
  $subtitle = @$_POST['subtitle'];
  $sql3 = "SELECT title, author, year FROM titles WHERE title LIKE '%$subtitle%'";
  $result3 = $conn->query($sql3);
  $found = 0;
  if($result3->num_rows > 0)
  {
    while($row = $result3->fetch_assoc())
    {
        echo "Title: " . $row["title"] . " " . "Author: " .  $row["author"]. " " . "Year: " . $row["year"];
        echo "<br>";
        $found = 1;
    }
    if($found == 0)
    {
      echo "No such record found";
    }
  }

}
if (@$_POST['upd'])
{
  $sbtitle = @$_POST['sbtitle'];
  $nyear = @$_POST['nyear'];

  if(is_string($sbtitle) && is_numeric($nyear))
  {
  $sql4 = "UPDATE titles SET year = '$nyear' WHERE title LIKE '%$sbtitle%'";
  if ($conn->query($sql4) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
}
else {
  echo "invalid data types";
}
$conn->close();
}
if (@$_POST['publifind'])
{
  $publi = @$_POST['publidat'];
  echo "Publisher: $publi<br>";
  $storage = array();
  $count = 0;
  $sql = "SELECT author, publisher FROM authors";
  $result = $conn->query($sql);
  if($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
      if($row["publisher"] == $publi)
      {
        $storage[$count] = $row["author"];
        $count++;
      }
    }
  }
  $sql2 = "SELECT title, author, year FROM titles";
  $result2 = $conn->query($sql2);
  if($result2->num_rows > 0)
  {
    while($row = $result2->fetch_assoc())
    {
      for($num=0;$num<$count;$num++)
      {
        if($storage["$num"] == $row["author"])
        {
          $pr = $row["title"];
          $pr2 = $row["author"];
          $pr3 = $row["year"];
          echo " Title: $pr Author: $pr2 Year: $pr3 <br>";
        }
      }
    }
  }



}


     ?>
  </body>
</html>
