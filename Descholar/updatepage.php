<!DOCTYPE html>
<html>
<head>
	<title>update</title>
	<link rel="stylesheet" href="style.css">
	<style >
		.error{color:#FF0000;}
		img {
  		border-radius: 50%;
		}
	</style>
</head>
<body>
 <?php
 $bool="true";
$usernameErr = $emailErr =$dobErr= $genderErr = $charonly=$emailonly="";
$userid=$username = $email =$dob= $gender ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["userid"])){
		$bool="false";
		$usernameErr="Problem in id";
	}
	else{
		$userid=test_input($_POST["username"]);
	}
  if (empty($_POST["username"])) {
  	$bool="false";
    $usernameErr = "Username is required";
  } elseif(ctype_alpha($_POST["username"])) {
      
      $username = test_input($_POST["username"]);
    }
    else{
    	$bool="false";
      $charonly="Only alphabet are allowed";
      }   
  if (empty($_POST["email"])) {
  	$bool="false";
    $emailErr = "Email is required";
  } elseif(filter_var(($_POST["email"]),FILTER_VALIDATE_EMAIL)) {
    $email = test_input($_POST["email"]);
  }
  else
  {
  	$bool="false";
    $emailonly="Give valide email";
  }
    
  if (empty($_POST["dob"])) {
    $dobErr = "";
  } else {
    $dob = test_input($_POST["dob"]);
  }
  if (empty($_POST["gender"])) {
  	$bool="false";
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php 
include_once 'dbconnect.php';
$sql1="SELECT userid,username,email,dob,gender,image FROM signup WHERE userid='".$_GET['userid']."'";
	$result2=mysqli_query($conn,$sql1);
	$row2=mysqli_fetch_assoc($result2);
	$oo=$row2["image"];
 ?>
 <h1 align="center">Update Page</h1>
 <div class="center">
 <center><form method="post"  >
 	<div><?php if(isset($message)) { echo $message; } ?>
</div>
    <label for="username">Username</label><span class="error">*<?php echo $usernameErr; ?></span><span class="error"><?php echo $charonly; ?></span><br>
 <input type="hidden" name="userid" value="<?php echo ($row2["userid"]); ?>"></input>
<input type="text" name="username" value="<?php echo ($row2["username"]); ?>"></input><br><br>
<label for="email">Email</label><span class="error">*<?php echo $emailErr; ?></span><span class="error"><?php echo $emailonly ?></span><br>
<input type="Email" name="email" value="<?php echo ($row2["email"]); ?>"></input><br><br>
<label for="dob">Date Of Birth</label><span class="error"><?php echo $dobErr; ?></span><br>
<input type="date" name="dob" value="<?php echo ($row2["dob"]); ?>"></input><br><br>
<label for="gender">Gender</label><span class="error">*<?php echo $genderErr; ?></span><br>
<input type="radio" id="male" name="gender" value="male"<?php  if($row2["gender"]=="male"){ echo "checked";}  ?>><label for="male">Male</label></input><br>
<input type="radio" id="female" name="gender" value="female"<?php  if($row2["gender"]=="female"){ echo "checked";} ?>><label for="female">Female</label></input><br>
<input type="radio" id="other" name="gender" value="other"<?php  if($row2["gender"]=="other"){ echo "checked";}  ?>><label for="other">Other</label></input><br>
<img src="$oo" alt="DP image"></img><br>
<input type="submit" name="update" value="Update"></input>
</form></center>
</div>
<?php if (isset($_POST["update"]) and $bool=="true") {
  $userid=$_REQUEST['userid'];
  $username=$_REQUEST['username'];
  $email=$_REQUEST['email'];
  $dob=$_REQUEST['dob'];
  $gender=$_REQUEST['gender'];
  $sql="UPDATE signup SET username='$username',email='$email',dob='$dob',gender='$gender' WHERE userid='$userid'";
  if(mysqli_query($conn,$sql))
  {
    echo"Update Success";
    header("location:viewpage.php")
    ?>
  <?php }
  else
  {
    echo "Error in Update:".$sql."<br>";mysqli_error($conn);
  } 
}
?>
</body>
</html>