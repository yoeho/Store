<?php
session_start();
$_SESSION['page_index']='add_editor';
if (isset($_SESSION['auth']) && $_SESSION['role']=="admin") 
{
?>
<!DOCTYPE html>
<html lang="en">
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="css/register.css" rel="stylesheet">

<title>Register</title>
</head>
<body>
<div class="container">
<h1 class="text-center text-success"><i class="fa fa-user-plus"></i>&nbsp;Add Editor</h1>
<form method="POST" action="editor_action.php">

<div class="form-group">
<label for="name" class="cols-sm-2 control-label">Name</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" required/>
</div>
<div id="message">
  <p id="min" class="invalid">Please Enter Your Name!</p>
</div>
</div>

<div class="form-group">
<label for="email" class="cols-sm-2 control-label">Email</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" required/>
</div>
<div id="message_1">
  <p id="soe" class="invalid">Please Enter Your Email!</p>
</div>
</div>

<div class="form-group">
<label for="user_name" class="cols-sm-2 control-label">Username</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
<input type="text" class="form-control" name="user_name" id="user_name" pattern="(?=.*[a-z])(?=.*[A-Z])" title="Must contain at least one uppercase and lowercase letter" placeholder="Enter your Username" required/>
</div>
<div id="message_2">
  <p id="mancity" class="invalid">A <b>lowercase</b> letter</p>
	<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
</div>
</div>

<div class="form-group">
<label for="password" class="cols-sm-2 control-label">Password</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required/>
</div>
<div id="message_3">
  <p id="length" class="invalid">Your password must be at least 6 characters!</p>
</div>
</div>

<div class="form-group">
<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password" required/>
</div>
<div id="message_4">
  <p id="equal" class="invalid">Your passwords do not match!</p>
</div>
</div>

<div class="form-group">
<label for="button" class="cols-sm-2 control-label"></label>
<input type="submit" id="button" class="btn btn-primary btn-md btn-block" value="Add" required>
<label for="button" class="cols-sm-2 control-label"></label>
<input type="submit" id="button_1" class="btn btn-secondary btn-md btn-block disabled" value="Add" required>
</div>

</form>
</div>
<script src="js/add_editor.js"></script>
</body>
</html>
<?php
}
else
{
	header("location: index.php");
}
?>