<?php
session_start(); 
$_SESSION['page_index']='products';
if (isset($_SESSION['auth']))
{
?>
<!DOCTYPE html>
<html>
<head>
<title>View Products_1 Table Style</title>
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
<h1 class="diaplay-4 text-primary my-5 ml-5"><i class="fa fa-cart-plus"></i>Products</h1>
<div class="container">
<?php
include('connection.php');
$count_sql = "SELECT COUNT(id) AS count FROM products";
$count_result = mysqli_query($conn, $count_sql);
$role_count = mysqli_fetch_assoc($count_result);
if($role_count['count'] != 0)
{
?>
<table class="table">	
<tr>
<th>lock</th>
<th>no</th>
<th>name</th>
<th>category</th>
<th>created_date</th>
<th class="text-center">amount</th>
<th></th>
<th></th>
</tr>

<?php
$sql = "SELECT * FROM `products`";
$result = mysqli_query($conn, $sql);
$b=1;
while ($row = mysqli_fetch_assoc($result)):
	if($row['lock']=='false')
	{
	?>
	
	<tr>
	<td>
	<a href="lock_product.php?id=<?php echo $row['id']?>" class="btn btn-group btn-outline-success">
		<i class="fa fa-unlock"></i> 
	</a>
	</td>
	<td><?php echo $b++?></td>
	<td><?php echo $row['name'] ?></td>
	<td><?php echo $row['category'] ?></td>
	<td><?php echo $row['created_date'] ?></td>
	<td><a href="decrease_amount.php?id=<?php echo $row['id']?>" class="btn btn-group btn-outline-danger">
		<i class="fa fa-minus"></i>
	</a>
	<a class="btn btn-group btn-block btn-light w-50"><strong><?php 
	if($row['amount'] < 10)
	{
		echo "<span class='text-warning ml-4'>".$row['amount']."</span>";
	}
	else if($row['amount']>= 100)
	{
		echo "<span class='text-success ml-4'>".$row['amount']."</span>";
	}
	else
	{
		echo "<span class='text-info ml-4'>".$row['amount']."</span>";
	}
	?></strong></a>
	<a href="increase_amount.php?id=<?php echo $row['id']?>" class="btn btn-group btn-outline-success">
		<i class="fa fa-plus"></i>
	</a></td>
	
	<td><a href="edit_product.php?id=<?php echo $row['id']?>" class="btn btn-block btn-primary float-right"><i class="fa fa-pencil"></i>&nbsp;Edit</a></td>
	<td><a href="delete_product.php?id=<?php echo $row['id']?>" class="btn btn-block btn-danger float-right"><i class="fa fa-trash"></i>&nbsp;Delete</a></td>
	</tr>
	<?php
	}


	else
	{
		?>

<tr>
	<td>

	<a href="unlock_product.php?id=<?php echo $row['id']?>" class="btn btn-group btn-outline-danger">
		<i class="fa fa-lock"></i>
	</a>
	</td>
	<td><?php echo $b++?></td>
	<td><?php echo $row['name'] ?></td>
	<td><?php echo $row['category'] ?></td>
	<td><?php echo $row['created_date'] ?></td>
	<td><a class="btn btn-group btn-outline-secondary disabled">
		<i class="fa fa-minus"></i>
	</a>
	<a class="btn btn-group btn-block btn-light w-50 disabled"><strong><?php 
	if($row['amount'] < 10)
	{
		echo "<span class='text-warning ml-4'>".$row['amount']."</span>";
	}
	else if($row['amount'] >= 100)
	{
		echo "<span class='text-success ml-4'>".$row['amount']."</span>";
	}
	else
	{
		echo "<span class='text-info ml-4'>".$row['amount']."</span>";
	}
	?></strong></a>
	<a class="btn btn-group btn-outline-secondary disabled">
		<i class="fa fa-plus"></i>
	</a>
	</td>
	
	<td><a class="btn btn-block btn-secondary float-right disabled"><i class="fa fa-pencil"></i>&nbsp;Edit</a></td>
	<td><a class="btn btn-block btn-secondary float-right disabled"><i class="fa fa-trash"></i>&nbsp;Delete</a></td>
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
<a href="new_product.php" class="btn btn-success btn-lg float-right mr-5 mt-5"><i class="fa fa-cart-plus"></i>&nbsp;Add Product</a>
</body>
</html>
</div>
<?php
}
else
{
	header("location:auth/login.php");
}
?>