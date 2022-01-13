<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    To show all the records of the records, click the below button. <br>
    <br>

    <form action="sqlact.php" method="post">
      <input type="submit" name="disprecords" value="Show records">
    </form>
<br>
<br>
    <form  action="sqlact.php" method="post">
      To add a record to the authors table enter data below, click Add record to authors
      <br>
      <br>
      Author:
      <input type="text" name="auth" value="">
      <br>
      <br>
      Publisher:
      <input type="text" name="publisher" value="">
<br>
<br>
      <input type="submit" name="add" value="Add record to authors">
    </form>
    <br>
    <br>
    <form  action="sqlact.php" method="post">
      To add a record to the titles table enter data below, click Add record to titles
      <br>
      <br>
      Title:
      <input type="text" name="title" value="">
      <br>
      <br>
      Author:
      <input type="text" name="auth" value="">
      <br>
      <br>
      Year:
      <input type="number" name="year" value="">
    <br>
    <br>
      <input type="submit" name="addtitle" value="Add record to titles">
    </form>
  
<br><br>
    <form  action="sqlact.php" method="post">
      To update the year of publication of a specific title, enter the title in the below box
      <br><br>
      <input type="text" name="sbtitle" value="">
      <br><br>
      Enter the new year you want to update it to:
      <br><br>
      <input type="number" name="nyear" value="">
      <br><br>
      <input type="submit" name="upd" value="Update record">
    </form>
<br><br>
<form  action="sqlact.php" method="post">
  To find details of a book, enter title below and click on Find details by Title.
  <br><br>
  <input type="text" name="subtitle" value="">
  <br><br>
  <input type="submit" name="aypb" value="Find details by Title">
</form>
<br><br>
<form action="sqlact.php" method="post">
  To find all records of a publisher, please enter his name below and click on Find Records.
  <br><br>
  <input type="text" name="publidat" value="">
  <br><br>
  <input type="submit" name="publifind" value="Find Records">
</form>
  </body>
</html>
