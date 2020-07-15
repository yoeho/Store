<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Login Page</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="../css/index.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="row">
<div class="container" id="formContainer">
<form class="form-signin" id="login" role="form" action="login_check.php" method="POST">
<h3 class="form-signin-heading text-center">Store Management</h3>
<input type="text" class="form-control mt-2" name="username" id="username" placeholder="UserName" required>
<input type="password" class="form-control mt-2" name="password" id="loginPass" placeholder="Password" required>
<input type="submit" id="login" class="btn btn-lg btn-primary btn-block" value="Log in">
</form>

</div>
</div>
</div>
</body>
</html>