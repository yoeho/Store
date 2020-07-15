<?php
session_start();
$_SESSION['page_index']='user';
if (isset($_SESSION['auth']) && $_SESSION['role']=="admin") 
{
	include('connection.php');
	$trash_sql= "SELECT COUNT(id) AS count FROM `users` WHERE `soft_delete`='true'";
	$trash_result= mysqli_query($conn,$trash_sql);
	$trash_row = mysqli_fetch_assoc($trash_result);
?>
<!DOCTYPE html>
<html>
<head>
<title>Users Table Style</title>
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
<div class="container">
<h1 class="diaplay-4 text-primary my-5 text-primary"><i class="fa fa-users"></i></i>&nbsp;Users</h1>
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
<th></th>
</tr>

<?php
$sql = "SELECT * FROM users WHERE soft_delete='false'";
$result = mysqli_query($conn, $sql);
$a = 1;
while ($row = mysqli_fetch_assoc($result)): 
	if($row['role']=='editor')
	{
	?>

	<tr>
	<td><?php echo $a++ ?></td>
	<td><?php echo $row['name'] ?></td>
	<td><?php echo $row['user_name'] ?></td>
	<td><?php echo $row['email'] ?></td>
	<td><?php echo $row['password'] ?></td>
    <td><?php echo $row['role'] ?></td>
	<td><a href="edit_user.php?id=<?php echo $row['id']?>" class="btn btn-block btn-primary float-right"><i class="fa fa-pencil"></i>&nbsp;Edit</a></td>
	<td><a href="promote_user.php?id=<?php echo $row['id']?>" class="btn btn-block btn-success float-right"><i class="fa fa-chevron-circle-up"></i>&nbsp;Promote</a></td>
	<td><a href="delete_user.php?id=<?php echo $row['id']?>" class="btn btn-block btn-danger float-right"><i class="fa fa-trash"></i>&nbsp;Delete</a></td>
	</tr>
	<?php
	}
	else
	{
	?>
	<tr>
	<td><?php echo $a++ ?></td>
	<td><?php echo $row['name'] ?></td>
	<td><?php echo $row['user_name'] ?></td>
	<td><?php echo $row['email'] ?></td>
	<td><?php echo $row['password'] ?></td>
    <td><?php echo $row['role'] ?></td>
	<td><a href="edit_user.php?id=<?php echo $row['id']?>" class="btn btn-block btn-primary float-right"><i class="fa fa-pencil"></i>&nbsp;Edit</a></td>
	<td></td>
	<td></td>
	</tr>
	<?php
	}
	
endwhile;

?>
</table>
<a href="add_editor.php" class="btn btn-success float-right mr-2 mb-5"><i class="fa fa-user-plus"></i>&nbsp;Add Editor</a>
<a href="user_viewTrash.php" class="btn btn-primary float-right mr-5 mb-5">
<i class="fa fa-eye"></i>&nbsp;View Trash Editor&nbsp;&nbsp;<?php echo '( '.$trash_row['count'].' )';?></a>
</body>
</html>
</div>
<?php
}
else
{
	header("location: index.php");
}
?>