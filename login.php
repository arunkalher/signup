<?php

$user_checked=0;
$user_exist=0;
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    include "connect.php";
    $username=$_POST["username"];
    $password=$_POST["password"];


    $sql="SELECT * FROM `registration` WHERE username='$username' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        $num=mysqli_num_rows($result);
        if($num>0)
        {
            $user_exist=1;
            session_start();
            $_SESSION["username"]=$username;
            header("location:home.php");

        }
        $user_checked=1;
        
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Page</title>
    <link rel="stylesheet" href="sign_styles.css">

</head>
<body>
    <header><div id="heading">Log In Page</div></header>
    <div id="container">
    <form action="login.php" method="post">
 
    <label class="lab_text" for="username">Name</label>
    <input type="text" class="form-control" placeholder="Enter Name" name="username">
  
  
    <label class="lab_text" for="password">Password</label>
    <input type="password" class="form-control"  placeholder="Password" name="password">
 
  
  <button type="submit" >Login</button>
</form>
    </div>
</body>
<?php
if ($user_checked)
{
    if($user_exist){
    echo "<div class='alert green'>Success: '$username' User successfully Logged In!!</div>";
}
else
{
    echo "<div class='alert red'>ERROR!! Invalid Credentials  ..</div>";
}
}
?> 

</html>