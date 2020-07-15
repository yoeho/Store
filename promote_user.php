<?php
session_start();
if (isset($_SESSION['auth']) && $_SESSION['role']=="admin")
{
include("connection.php");
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$username = $row['user_name'];
$email = $row['email'];
$password = $row['password'];
$role = $row['role'];
// echo $role;

if($role=='editor')
{

$change_admin_sql = "UPDATE users SET role='editor' WHERE role='admin'";
mysqli_query($conn,$change_admin_sql);

$sql = "UPDATE users SET name='$name', user_name='$username', email='$email', password='$password',
role='admin' WHERE id=$id";
mysqli_query($conn,$sql);


date_default_timezone_set("Asia/Yangon");
    $time = date('d-m-Y h:i:s A');
    $log_description = $_SESSION['user_name']." editor promote at "."( ".$time." )";
    $log_sql = "INSERT INTO log(`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);

    $username = $_SESSION['user_name'];


session_unset();

$_SESSION['auth'] = true;
$_SESSION['user_name'] = $username;
$_SESSION['role']= "editor";
}
else
{
$sql = "UPDATE users SET name='$name', user_name='$username', email='$email', password='$password',
role='$role' WHERE id=$id";
mysqli_query($conn,$sql);
}

header("location: user.php");
}
else
{
    header("location: auth/login.php");
}