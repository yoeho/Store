<?php
session_start();
if (isset($_SESSION['auth']) && $_SESSION['role']=="admin") 
{
?>
<!DOCTYPE html>
<html>
<head>
<title> User View Trash Table Style</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<?php

include("components/nav.php");

?>
<h1 class="diaplay-4 text-primary my-5 ml-5"><i class="fa fa-trash"></i>&nbsp;Editor Trash</h1>
<div class="container">
<?php
include('connection.php');
$count_sql = "SELECT COUNT(id) AS count FROM users WHERE soft_delete='true'";
$count_result = mysqli_query($conn, $count_sql);
$role_count = mysqli_fetch_assoc($count_result);
// echo $role_count['count'];
if($role_count['count'] != 0)
{
?>
<table class="table">	
<tr>
<th>id</th>
<th>name</th>
<th>user_name</th>
<th>email</th>
<th>password</th>
<th>role</th>
<th></th>
<th></th>
</tr>

<?php
$sql = "SELECT * FROM users WHERE soft_delete='true'";
$result = mysqli_query($conn, $sql);
$f=1;
while ($row = mysqli_fetch_assoc($result)): 
	?>
	
	<tr>
	<td><?php echo $f++ ?></td>
	<td><?php echo $row['name'] ?></td>
	<td><?php echo $row['user_name'] ?></td>
	<td><?php echo $row['email'] ?></td>
	<td><?php echo $row['password'] ?></td>
    <td><?php echo $row['role'] ?></td>
	<td><a href="editor_restore.php?id=<?php echo $row['id']?>" class="btn btn-block btn-success float-right"><i class="fa fa-undo"></i>&nbsp;Restore</a></td>
	<td><a href="delete_viewTrash.php?id=<?php echo $row['id']?>" class="btn btn-block btn-danger float-right"><i class="fa fa-trash"></i>&nbsp;Delete</a></td>
	</tr>
	
	<?php
	
	
endwhile;

?>
</table>
<?php
}
else
{
?>
<center><h3 class="display-4">No Data</h3></center>
<?php	
}
?>
<a href="user.php" class="btn btn-primary float-right mr-5 mt-5">Back&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a>
</div>
</body>
</html>
<?php
}
else
{
	header("location:auth/login.php");
}
?>