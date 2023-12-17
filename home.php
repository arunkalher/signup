<?php
session_start();
if(!isset($_SESSION["username"]))
{
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>
<body>
    <h1 style="text-align: center;
    color: blue;
    font-size: 40px;
    font-family: math;
    margin:30px">Welcome
        <?php
            echo $_SESSION["username"];
        ?>
    </h1>
        <div  style="display:flex;justify-content: center;">
      <button style="width:100px;width: 70px;
    font-size: 15px;
    background-color: aquamarine;
    border: 2px solid blue;
    border-radius: 6px;"><a style="text-decoration:none;color:black;" href="logout.php">Logout</a></button>
      </div>
    
</body>
</html>