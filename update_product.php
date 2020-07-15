<?php
session_start();
include("connection.php");
$id= $_POST['id'];
$name = $_POST['name'];
$category = $_POST['category'];
$date = $_POST['date'];
$amount = $_POST['amount'];

$sql = "UPDATE products SET name='$name', category='$category', created_date='$date', amount='$amount' WHERE id=$id";
mysqli_query($conn,$sql);
// echo $sql;

date_default_timezone_set("Asia/Yangon");
    $time = date('d-m-Y h:i:s A');
    $log_description = $_SESSION['user_name']." update category at "."( ".$name." )"."( ".$time." )";
    $log_sql = "INSERT INTO log(`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);

    if($amount < 10)
{
    date_default_timezone_set("Asia/Yangon");
    $noti_date = date('Y-m-d');
    // echo $noti_date;
    $noti_time = date('h:i:s A');
    $noti_description = $_SESSION['user_name']." add product amount at "."( ".$name." )"."( ".$amount." )"."( ".$noti_date." )"."( ".$noti_time." )";
    $noti_sql = "INSERT INTO `notifications`(`title`,`date`,`time`,`description`,`flag`) VALUES ('Less than 10','$noti_date','$noti_time','$noti_description','unread')";
    mysqli_query($conn,$noti_sql);
}

 header("location:products.php");

?>