<!DOCTYPE html>
<html ln="en">
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width;initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <style>
            .error{color:#FF0000;}
            form {
                box-sizing: border-box;
                font-size:initial;
                padding:initial;
            }
            body form{
                padding-left: 30px;
            }
        </style>
    </head>
    <body>

        <?php include_once "dbconnect.php";
    $bool="true";
    $email=$password="";
    $emailErr=$passwordErr="";
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["email"])) {
    $bool="false";
    $emailErr = "Email is required";
  } else{
      $email = test_input($_POST["email"]);
    }
    if (empty($_POST["password"])) {
    $bool="false";
    $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
  }
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
        <h1 style="text-align: center;">Login</h1>
        <center><form style="align-items: center; " method="post" name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label style="align-self: initial;" for="email">Email</label><span class="error">*<?php echo $emailErr; ?></span><br>
            <input type="email" id="email" name="email" autofocus ></input><br>
            <label for="password">Password</label><span class="error">*<?php echo $passwordErr; ?></span><br>
            <input type="password" id="password" name="password" ></input><br>
            <input style="padding: 8px;;" type="submit"
            name="submit" value="submit"><br>
            <a href= "delete.php?userid=<?php echo $row["userid"]; ?>" >Login</a><br>
            <a href="">Forgot Password</a><br>
            <a href="signuppage.html">Sign Up</a><br>
        </form></center>
<?php
if (isset($_POST["submit"])){
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$sql="SELECT userid,password FROM signup WHERE email='$email'";
 $result=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($result);
 $passworddb=$row["password"];
 if($verify=password_verify($password,$passworddb)){
    header("location:homepage.php");
}
else{
    echo "Error in password";
}
}
?>
    </body>
</html>