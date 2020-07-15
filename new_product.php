<?php
session_start();
if (isset($_SESSION['auth'])) 
{
?>
    <!DOCTYPE html>
<html>
<head>
<title>New Product</title>
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
<h1 class="diaplay-4 text-primary my-5 text-primary"><i class="fa fa-cart-plus"></i>New Product</h1>
<form action="save_product.php" method="POST">
<div class="form-group text-success">
<label for="productName">Product Name</label>
<input type="text" class="form-control" id="productName" name="name" required>
</div>
<div class="form-group text-success">
<label for="productCategory">Product Category</label>
<select class="form-control" id="productCategory" name="category" required>
<?php
include('connection.php');
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)):
    ?>

    <option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>

    <?php
    endwhile;

?>
</select>
</div>

<div class="form-group text-success">
<label for="amount">Amount</label>
<input type="number" class="form-control" id="amount" name="amount">
</div>

<div class="form-group text-success">
<label for="createdDate">Created Date</label>
<input type="date" class="form-control" id="createdDate" name="date" required>
</div>
<input type="submit" class="btn btn-block btn-success float-right my-3" value="Add">
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