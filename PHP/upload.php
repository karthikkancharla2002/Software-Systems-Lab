<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $target_dir = "images/";
    @$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    @$delete_file = $_FILES["fileToDelete"]["name"];
    $uploadOk = 1;
    $deleteOk = 1;
    $count = 0;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $dir = "images/";

if($_POST['act'] == "delete")
{
    if (file_exists("images/".$delete_file)) {
      unlink("images/".$delete_file);
      if (file_exists("images/".$delete_file))
      {
        echo "Sorry Image could not be deleted"."<br>";
      }
      else {
        echo "Image deleted successfully"."<br>";
      }
    }
}
else{
if(isset($_POST["submit2"]))
{

}

    if (is_dir($dir)){
      if ($dh = opendir($dir)){
        while (($file = readdir($dh)) !== false){
          if($file != '' && $file != '.' && $file != '..')
          {
            $count++;
          }
        }
        closedir($dh);
      }
    }

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        echo "File is not an image." . "<br>";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, image already exists." . "<br>";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 200000) {
      echo "Sorry, your image is larger than 200KB." . "<br>";
      $uploadOk = 0;
    }

    // Allow jpg file formats only
    if($imageFileType != "jpg") {
      echo "Sorry, only JPG images are allowed." . "<br>";
      $uploadOk = 0;
    }
    if($count >= 10)
    {
      echo "Sorry 10 images have already been uploaded. Can't upload more.";
      $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0 ) {
      echo "Sorry, your image was not uploaded." . "<br>";
    // if everything is ok, try to upload file
  }
   else  {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The image ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your image." . "<br>";
      }
    }
  }
    ?>
    <br>
    <br>
    <input type="button" onclick="window.location.href = 'http://localhost/newupload.php';" value="Go back to the previous page" id="prevbtn">

  </body>
</html>
