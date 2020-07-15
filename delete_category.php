<?php
session_start();
if(isset($_SESSION['auth']))
{
    include('connection.php');
    $id = $_GET['id'];
    $category_name_result=mysqli_query($conn,"SELECT name FROM categories WHERE id=$id");
    $category_name_row = mysqli_fetch_assoc($category_name_result);
    $category_name = $category_name_row['name'];

    $delete_product_sql = "DELETE FROM `products` WHERE `category`='$category_name'";
    mysqli_query($conn,$delete_product_sql);
    // echo $delete_product_sql;
    $delete_category_sql="DELETE FROM `categories` WHERE `id`='$id'";
    mysqli_query($conn,$delete_category_sql);
    
    date_default_timezone_set("Asia/Yangon");
    $time = date('d-m-Y h:i:s A');
    $log_description = $row['user_name']." delete category at "."( ".$category_name." )"."( ".$time." )";
    $log_sql = "INSERT INTO log(`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);
    
    header("location:category.php");
}
else
{
    header("location: auth/login.php");
}