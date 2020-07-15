<?php
session_start();
include('connection.php');

$name = $_POST['name'];
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

if($password==$confirm)
{
$sql = "INSERT INTO `users` (`name`,`user_name`,`email`,`password`,`role`,`soft_delete`) 
VALUES ('$name','$user_name','$email','$password','editor','false')";
mysqli_query($conn,$sql);

date_default_timezone_set("Asia/Yangon");
    $time = date('d-m-Y h:i:s A');
    $log_description = $_SESSION['user_name']." add editor at "."( ".$user_name." )"."( ".$time." )";
    $log_sql = "INSERT INTO log(`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);


header('location: user.php');
}
else
{
    header('location: auth/login.php');
}
?>