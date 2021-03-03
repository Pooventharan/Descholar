<?php include_once 'viewpage.php';
  $sql="DELETE FROM Signup WHERE userid= '".$_GET["userid"]."'";
  if(mysqli_query($conn,$sql))
  {
    echo"Delete Success";
  }
  else
  {
    echo "Error in delete:".$sql."<br>";mysqli_error($conn);
  }
?>