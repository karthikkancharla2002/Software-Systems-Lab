<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="text" name="act" value="add" hidden >
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
<br>
<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to delete:
  <input type="text" name="act" value="delete" hidden >
  <input type="file" name="fileToDelete" id="fileToDelete">
  <input type="submit" value="Delete Image" name="submit2">
  <br>
  <br>
  Please select the image to be uploaded or deleted from the img folder only.
  <br>
  If u wan't to delete a image from the album, select that image from img directory instead of images directory.
  <br>
  Please note that img folder contains many images, that may not be present in album.
  <br>
  Album shows photos from images directory.
  <br>
  So, to remove a photo, select the same photo in the img/ directory instead of images/ directory.
</form>
</body>
</html>
