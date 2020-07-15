<?php
session_start();
$_SESSION['page_index'] = 'notifications';
if (isset($_SESSION['auth']))
{
?>
    <!DOCTYPE html>
<html>
<head>
<title>Notifications</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
.newLogo{
    width: 50px;
    height: 50px;
    margin-left: 20px;
    /* margin-top: -10px; */
    border-radius: 50%;
}
.newLogo_1{
    display: none;
}

</style>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script>
setcookie("notivar".time()-3600)
</script>
</head>
<body>
<?php

include("components/nav.php");

?>
<h1 class="diaplay-4 my-5 text-success ml-5"><i class="fa fa-bell"></i>&nbsp;Notifications</h1>
<div class="container">
<table class="table">	
<tr>
<th>no</th>
<th>title</th>
<th>date</th>
<th>time</th>
<th></th>
<th><a href="notifications_check.php" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Mark All Read</a></th>
</tr>

<?php
include('connection.php');
$sql = "SELECT * FROM notifications ORDER BY id DESC LIMIT 10";
$result = mysqli_query($conn, $sql);
$noti = 1;
while ($row = mysqli_fetch_assoc($result)): 
  ?>
    <tr class="noti_row">
	<td><?php echo $noti++ ?></td>
	<td><?php echo $row['title'] ?></td>
	<td><?php echo $row['date'] ?></td>
    <td><?php echo $row['time'] ?></td>
    <td>
    <input type="hidden" value="<?php echo $row['description'] ?>" >
    <input type="hidden" value="<?php echo $row['id'] ?>" >
    <button type="button" class="btn btn-outline-success view" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></button>
    <img src="css/star.png" alt="star" class=" <?php echo ($row['flag']=='unread')?'newLogo':'newLogo_1';?>">
	<div class="modal fade" id="exampleModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Description</h5>
                </div>
                <div class="modal-body">
                    <?php
                    echo $_COOKIE['notivar'];
                    ?>
                </div>
                <div class="modal-footer">
                    <a href="notifications_read.php" class="btn btn-success float-right">Close</a>
                </div>
                    
                
            </div>
        </div>
    </div>
    </td>
	</tr>   
<?php

endwhile;
?>
</table>
</div>

<script type="text/javascript">
$('.view').click (function()
{
   
    var id = $(this).prev().val();
    var description = $(this).prev().prev().val();
    document.cookie = "notivar="+ id;

    $('.modal-body').html(description);
});

// $('.noti_row').click (function()
// {
//     alert("hi");
//     $[this].click();
// });

</script>
</body>
</html>
<?php
}
else
{
	header("location:auth/login.php");
}
?>