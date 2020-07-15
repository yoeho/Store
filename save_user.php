<?php
include('connection.php');
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$sql = "INSERT INTO `users` (`name`,`user_name`,`email`,`password`,`role`) 
VALUES ('$name','$username','$email','$password','$role')";
mysqli_query($conn,$sql);
header("location:user.php");
// echo $sql;
?>