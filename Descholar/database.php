<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skp";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn)
{
 echo "NOT CONNECTED";
}
else
{
  echo "CONNECTED";
  echo "Done";
}

if(isset($_POST["submit"])){
$sql="INSERT INTO signin(username,email,dob,gender,password,con_password) values('$username','$email',$dob,'$gender','$password','$con_password')";
  if(mysqli_query($conn,$sql))
  {

    echo"Success";
  }
  else
  {
    echo "Error:".$sql."<br>";mysqli_error($conn);
  }
  }
  elseif(isset($_POST["delete"])) {
  $username=$_REQUEST['username'];
  $email=$_REQUEST['email'];
  $dob=$_REQUEST['dob'];
  $password=$_REQUEST['password'];
  $con_password=$_REQUEST['con_password'];
  $sql="DELETE FROM Signin WHERE email='$email'";
  if(mysqli_query($conn,$sql))
  {
    echo"Delete Success";
  }
  else
  {
    echo "Error in delete:".$sql."<br>";mysqli_error($conn);
  }
}
elseif (isset($_POST["update"])) {
  $username=$_REQUEST['username'];
  $email=$_REQUEST['email'];
  $dob=$_REQUEST['dob'];
  $gender=$_REQUEST['gender'];
  $password=$_REQUEST['password'];
  $con_password=$_REQUEST['con_password'];
  $sql="UPDATE signin SET username='$username',email='$email',dob='$dob',gender='$gender',password='$password',con_password='con_password' WHERE email='$email'";
  if(mysqli_query($conn,$sql))
  {
    echo"Update Success";
  }
  else
  {
    echo "Error in Update:".$sql."<br>";mysqli_error($conn);
  } 
}
?>