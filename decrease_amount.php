<?php
session_start();
if(isset($_SESSION['auth']) && $_SESSION['role']=="admin")
{
    include('connection.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row['amount'] <= 0)
    {
        $a=$row['amount'];
        $sql1="UPDATE products SET amount='$a' WHERE id=$id";
        mysqli_query($conn,$sql1); 
        header("location:products.php");
    }
    else
    {
    $a=$row['amount']-1;
    $sql1="UPDATE products SET amount='$a' WHERE id=$id";
    mysqli_query($conn,$sql1);

    date_default_timezone_set("Asia/Yangon");
    $time = date('d-m-Y h:i:s A');
    $log_description = $_SESSION['user_name']." decrease amount at "."( ".$row['name']." )"."( ".$row['amount']." )"."( ".$a." )"."( ".$time." )";
    $log_sql = "INSERT INTO log(`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);

    // echo $row['amount'];


if($row['amount'] < 10)
{
    date_default_timezone_set("Asia/Yangon");
    $noti_date = date('Y-m-d');
    $noti_time = date('h:i:s A');
    $noti_description = $_SESSION['user_name']." noti decrease amount at "."( ".$row['name']." )"."( ".$row['amount']." )"."( ".$a." )"."( ".$noti_date." )"."( ".$noti_time." )";
    $noti_sql = "INSERT INTO notifications(`title`,`date`,`time`,`description`,`flag`) VALUES ('Less than 10','$noti_date','$noti_time','$noti_description','unread')";
    // echo $noti_sql;
    mysqli_query($conn,$noti_sql);
}
    
    header("location:products.php");
}
}
else
{
    header("location:auth/login.php");
}
?>