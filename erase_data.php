<?php
session_start();
if (isset($_SESSION['auth'])) 
{
    include('connection.php');
    $sql_product="DELETE FROM products";
    mysqli_query($conn,$sql_product);

    $sql_category="DELETE FROM categories";
    mysqli_query($conn,$sql_category);

    $sql_user="DELETE FROM users WHERE role='editor'";
    mysqli_query($conn,$sql_user);

    $sql_log="DELETE FROM log";
    mysqli_query($conn,$sql_log);

    date_default_timezone_set("Asia/Yangon");
    $time = date('d-m-Y h:i:s A');
    $log_description = $_SESSION['user_name']." erase data at "."( ".$time." )";
    $log_sql = "INSERT INTO log(`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);

    header("location:auth/logout.php");
}
else
{
    header("location:auth/login.php");
}