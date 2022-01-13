<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Album</title>
    <h1>Album</h1>
  </head>
  <body>
    <p>Scroll down to view navigation buttons.</p>
    <?php
$count = 0;
$storage = array();
$imgindex = @$_GET["imindex"];

    $dir = "images/";
    if (is_dir($dir)){
      if ($dh = opendir($dir)){
        while (($file = readdir($dh)) !== false){
          if($file != '' && $file != '.' && $file != '..')
          {

          $image_path = "images/".$file;
          $storage[$count] = $image_path;
          $count++;
          $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);

        }
        }
        closedir($dh);
      }
    }
    ?>
    <?php
    if($imgindex>=1)
    {
      ?>
      <img src="<?php echo $storage[$imgindex]; ?>" />
      <?php
    }
    ?>
      <?php
      if($imgindex <1)
      {
        ?>
        <img src="<?php echo $storage[0]; ?>" />
        <?php
      }
      if($imgindex > $count-1)
      {
        echo "No further images found";
      }
     ?>
     <br>
<br>
<form  action="album.php" method="get">
  <input type="number" name="imindex" value="<?php echo $imgindex+1 ?>" hidden>
  <input type="submit" value = "Next">
</form>
<br>
<form  action="album.php" method="get">
  <input type="number" name="imindex" value="<?php echo $imgindex-1 ?>" hidden>
  <input type="submit" value = "Prev">
</form>
<br>
<form  action="album.php" method="get">
  <input type="number" name="imindex" value="0" hidden>
  <input type="submit" value = "First">
</form>
<br>
<form  action="album.php" method="get">
  <input type="number" name="imindex" value="<?php echo $count-1 ?>" hidden>
  <input type="submit" value = "Last">
</form>
<br>
<form  action="newupload.php" method="post">
  <input type="submit" name="upl" value="Upload/Delete an Image">
</form>
  </body>
</html>
