<?php
session_start();
if(isset($_SESSION['auth']) && $_SESSION['role']=="admin")
{
    include('connection.php');
    $id = $_GET['id'];
    $sql="UPDATE users SET soft_delete= 'false' WHERE id=$id";
    mysqli_query($conn,$sql);

    $sql = "SELECT user_name FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    date_default_timezone_set("Asia/Yangon");
    $time = date('d-m-Y h:i:s A');
    $log_description = $_SESSION['user_name']." editor restore at "."( ".$row['user_name']." )"."( ".$time." )";
    $log_sql = "INSERT INTO log(`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);
    
    header("location:user_viewTrash.php");
}
else
{
    header("location:auth/login.php");
}