<?php
session_start();
if (isset($_SESSION['auth'])) 
{
include("connection.php");
$id = $_GET['id'];
$sql = "SELECT * FROM categories WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>New Category</title>
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
<div class="container w-50">
<h1 class="diaplay-4 text-primary my-5 text-success"><i class="fa fa-th"></i>&nbsp;Edit Categoty</h1>
<form action="update_category.php" method="POST">
<input type="text" name="id" value="<?php echo $row ['id']; ?>" hidden>
<div class="form-group text-success">
<label for="categoryName">Name</label>
<input type="text" class="form-control" id="categoryName" name="name" value="<?php echo $row['name'] ?>">
</div>

<input type="submit" class="btn btn-block btn-primary float-right my-3" value="Save">
</form>
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