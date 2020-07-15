<?php
session_start();
$_SESSION['page_index'] = 'category';
if (isset($_SESSION['auth']))
{
?>
    <!DOCTYPE html>
<html>
<head>
<title>View Category Table Style</title>
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
<h1 class="diaplay-4 my-5 text-success ml-5"><i class="fa fa-th"></i>&nbsp;&nbsp;Categories</h1>
<div class="container">
<?php
include('connection.php');
$count_sql = "SELECT COUNT(id) AS count FROM categories";
$count_result = mysqli_query($conn, $count_sql);
$role_count = mysqli_fetch_assoc($count_result);
// echo $role_count['count'];
if($role_count['count'] != 0)
{
?>
<table class="table">	
<tr>
<th>no</th>
<th>name</th>
<th></th>
<th></th>
</tr>

<?php
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
$c=1;
while ($row = mysqli_fetch_assoc($result)): 
	if($_SESSION['role']=='admin')
	{
	?>
	
	<tr>
	<td><?php echo $c++ ?></td>
	<td><?php echo $row['name'] ?></td>
	<td><a href="edit_category.php?id=<?php echo $row['id']?>" class="btn btn-block btn-info float-right w-50"><i class="fa fa-pencil"></i>&nbsp;Edit</a></td>
	<td><a href="delete_category.php?id=<?php echo $row['id']?>" class="btn btn-block btn-danger float-right w-50"><i class="fa fa-trash"></i>&nbsp;Delete</a></td>
	</tr>
	
	<?php
	}
	else
	{
	?>
	<tr>
	<td><?php echo $c++ ?></td>
	<td><?php echo $row['name'] ?></td>
	<td><a href="edit_category.php?id=<?php echo $row['id']?>" class="btn btn-block btn-info float-right w-50"><i class="fa fa-pencil"></i>&nbsp;Edit</a></td>
	<td></td>
	</tr>
	<?php
	}
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
</div>
    <a href="new_category.php" class="btn btn-success btn-lg float-right mt-5 mr-5"><i class="fa fa-plus"></i>&nbsp;Add Category</a>
</body>
</html>
<?php
}
else
{
	header("location:auth/login.php");
}
?>