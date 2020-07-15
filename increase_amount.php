<?php
session_start();
if(isset($_SESSION['auth']) && $_SESSION['role']=="admin")
{
    include('connection.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM `products` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row['amount'] >= 10000)
    {
       
    $a=$row['amount'];
    $sql1="UPDATE products SET amount='$a' WHERE id=$id";
    mysqli_query($conn,$sql1);
    header("location:products.php"); 
    }
    else
    {
    $a=$row['amount']+1;
    $sql1="UPDATE products SET amount='$a' WHERE id=$id";
    mysqli_query($conn,$sql1);
    // echo $row['amount'];


    date_default_timezone_set("Asia/Yangon");
    $time = date('d-m-Y h:i:s A');
    $log_description = $_SESSION['user_name']." increase amount at "."( ".$row['name']." )"."( ".$row['amount']." )"."( ".$a." )"."( ".$time." )";
    $log_sql = "INSERT INTO log(`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);

    if($row['amount'] < 10)
{
    date_default_timezone_set("Asia/Yangon");
    $date = date('Y-m-d');
    $time = date('h:i:s A');
    $noti_description = $_SESSION['user_name']." noti increase amount at "."( ".$row['name']." )"."( ".$row['amount']." )"."( ".$a." )"."( ".$date." )"."( ".$time." )";
    $noti_sql = "INSERT INTO notifications(`title`,`date`,`time`,`description`,`flag`) VALUES ('Less than 10','$date','$time','$noti_description','unread')";
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