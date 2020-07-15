<?php
session_start();
$_SESSION['page_index']='log';
if (isset($_SESSION['auth']))
{
?>
    <!DOCTYPE html>
<html>
<head>
<title>Log</title>
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
<h1 class="diaplay-4 my-5 text-success ml-5"><i class="fa fa-history"></i>&nbsp;&nbsp;History</h1>
<div class="container w-50">
<table class="table">	
<tr>
<th>no</th>
<th>description</th>
</tr>

<?php
include('connection.php');
$sql = "SELECT * FROM log ORDER BY id DESC LIMIT 10";
$result = mysqli_query($conn, $sql);
$log=1;
while ($row = mysqli_fetch_assoc($result)): 
	
	?>
	
	<tr>
	<td><?php echo $log++ ?></td>
	<td><?php echo $row['description'] ?></td>
	</tr>
	
	<?php
endwhile;

?>
</table>
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