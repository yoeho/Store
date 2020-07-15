<?php
session_start();
include("connection.php");
$id= $_POST['id'];
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

// echo $role;
if($role=='admin')
{
$change_admin_sql = "UPDATE users SET role='editor' WHERE role='admin'";
mysqli_query($conn,$change_admin_sql);

$sql = "UPDATE users SET name='$name', user_name='$username', email='$email', password='$password',
role='$role' WHERE id=$id";
mysqli_query($conn,$sql);

$sql = "SELECT user_name FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$username = $_SESSION['user_name'];
// echo $_SESSION['user_name'];


date_default_timezone_set("Asia/Yangon");
$time = date('d-m-Y h:i:s A');
$log_description = $_SESSION['user_name']." update user admin at "."( ".$row['user_name']." )"."( ".$time." )";
$log_sql = "INSERT INTO log(`description`) VALUES ('$log_description')";
mysqli_query($conn,$log_sql);


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

// echo $_SESSION['auth'];
// echo $_SESSION['user_name'];
// echo $_SESSION['role'];

header("location:user.php");

?>