<?php
session_start();
include('connection.php');
$name = $_POST['name'];
$category = $_POST['category'];
$date = $_POST['date'];
$amount = $_POST['amount'];
$sql = "INSERT INTO `products` (`name`,`category`,`created_date`,`amount`) 
VALUES ('$name','$category','$date','$amount')";
mysqli_query($conn,$sql);

date_default_timezone_set("Asia/Yangon");
    $time = date('d-m-Y h:i:s A');
    $log_description = $_SESSION['user_name']." add product at "."( ".$name." )"."( ".$time." )";
    $log_sql = "INSERT INTO log(`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);

if($amount < 10)
{
    date_default_timezone_set("Asia/Yangon");
    $noti_date = date('Y-m-d');
    // echo $noti_date;
    $noti_time = date('h:i:s A');
    // echo $noti_time;
    $noti_description = $_SESSION['user_name']." noti add product at "."( ".$name." )"."( ".$amount." )"."( ".$noti_date." )"."( ".$noti_time." )";
    $noti_sql = "INSERT INTO `notifications`(`title`,`date`,`time`,`description`,`flag`) VALUES ('Less than 10','$noti_date','$noti_time','$noti_description','unread')";
    // echo $noti_sql;
    mysqli_query($conn,$noti_sql);
    // if(mysqli_query($conn,$noti_sql)){
    //     echo "Records added successfully";
    // } else{
    //     echo "ERROR: Could not able to execute";
    // }
}

header("location:products.php");
?>