<?php

$success=0;
$user=0;
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    include "connect.php";
    $username=$_POST["username"];
    $password=$_POST["password"];
    $sql="SELECT * FROM `registration` WHERE username='$username'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        $num=mysqli_num_rows($result);
        if($num>0)
        {
            $user=1;


        }
        else{
            $sql_="INSERT INTO registration(username,password) VALUES('$username','$password')";
            $result_=mysqli_query($conn,$sql_);
            if($result_)
            $success=1;
        }

    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="sign_styles.css">

</head>
<body>
    <header><div id="heading">Sign Up Page</div></header>
    <div id="container">
    <form action="sign.php" method="post">
 
    <label class="lab_text" for="username">Name</label>
    <input type="text" class="form-control" placeholder="Enter Name" name="username">
  
  
    <label class="lab_text" for="password">Password</label>
    <input type="password" class="form-control"  placeholder="Password" name="password">
 
  
  <button type="submit" >Sign Up</button>
</form>
    </div>
</body>
<?php
if($user){
   
    echo "<div class='alert red'>User already Exists</div>";
}
if($success)
{
    echo "<div class='alert green'>'$username' Successfully Registered!</div>";
}
?> 

</html>