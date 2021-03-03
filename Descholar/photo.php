<!DOCTYPE html>
<html>
<head>
	<title>Photo</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include_once 'dbconnect.php';
?>
<h1 align="center">Upload Image</h1>
<center><form method="post">
<label for="dpfile">Choose Image</label><br>
<input type="file" name="dpfile" ></input><br>
<input type="submit" name="dpfile" value="Upload"></input>
</form></center>
</body>
</html>