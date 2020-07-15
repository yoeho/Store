<?php
session_start();
if (isset($_SESSION['auth']) && $_SESSION['role']=="admin")
{
include("connection.php");
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>
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
<h1 class="diaplay-4 text-primary my-5 text-primary"><i class="fa fa-users"></i></i>&nbsp;Edit User</h1>
<form action="update_user.php" method="POST">
<input type="text" name="id" value="<?php echo $row ['id']; ?>" hidden>
<div class="form-group text-success">
<label for="name">Name</label>
<input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'] ?>">
</div>

<div class="form-group text-success">
<label for="userName">User Name</label>
<input type="text" class="form-control" id="userName" name="username" value="<?php echo $row['user_name'] ?>">
</div>

<div class="form-group text-success">
<label for="role">Role</label>
<select class="form-control" id="role" name="role">
<?php
$role_sql = "SELECT * FROM roles";
$role_result = mysqli_query($conn,$role_sql);
while($role_row = mysqli_fetch_assoc($role_result)):
?>

<option value="<?php echo $role_row['name']?>"
<?php if($role_row['name']==$row['role'])
{
	echo "selected";
}?>>
<?php echo $role_row['name'];
?>
</option>

<?php
endwhile;
?>
</select>
</div>

<div class="form-group text-success">
<label for="email">Email</label>
<input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>">
</div>

<div class="form-group text-success">
<label for="password">Password</label>
<input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password'] ?>">
</div>

<input type="submit" class="btn btn-block btn-success float-right my-3" value="Save">
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
