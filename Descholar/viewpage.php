<!DOCTYPE html>
<html>
<head>
	<title>view</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include "dbconnect.php";
$sql="SELECT  userid,username,email,dob,gender,image FROM signup";
$result=mysqli_query($conn,$sql);
?>
<h1 align="center">View Page</h1>
<table border="1" >
	<tbody>
	<tr>
		<th>userid</th>
		<th>Username</th>
		<th>Email</th>
		<th>Date Of Birth</th>
		<th>Gender</th>
	</tr>
	<?php 
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){?>
		<tr>
		 <td><?php echo ($row["userid"]);?></td>
		 <td><?php echo ($row["username"]);?></td>
		 <td><?php echo ($row["email"]);?></td>
		 <td><?php echo ($row["dob"]);?></td>
		 <td><?php echo ($row["gender"]);?></td>
		 <td><?php echo ($row["image"]);?></td>
		 <td><a href= "delete.php?userid=<?php echo $row["userid"]; ?>" >Delete</a></td>
		 <td><a href= "updatepage.php?userid=<?php echo $row["userid"]; ?>" >Update</a></td>
		</tr>
	<?php }
	} ?>
	</tbody>
</table>
</body>
</html>