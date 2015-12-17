
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style type ="text/css">
	input{
		display: inline-block;
		margin: 10px 10px 10px 0;
	}

	.row{
		border: 1px solid silver;
	}
	.form-group{
		padding: 10px;
	}
	.block{
		width: 400px;
		margin: 10px 10px 10px 0;
		vertical-align: top;
		display: inline-block;
		border: 1px solid silver;
		border-radius: 20px;
		padding: 20px;
		
	}
	</style>
</head>
<body>
	<div class = 'container'>
		<h1>Welcome</h1>
		<?php 
				if (isset($errors)) {
				 	echo $errors;
		} 
		?>
		<div class = 'block'>
			<h3>Register</h3>
			<form action= "/login/register" method = "post">
				Name:
				<input type="text" name = "name">
				<br>
				Alias:
				<input type="text" name = "alias">
				<br>
				Email:
				<input type="text" name = "email">
				<br>
				Password:
				<input type="password" name = "password">
				<br>
				*Password should be at least 8 characters
				<br>
				Confirm PW:
				<input type="password" name = "confirm_password">
				<br>
				<input type="submit" value = "Register" class = "btn btn-warning">
			</form>			
		</div>
		<div class = 'block'>
			<h3>Login</h3>
			<form action="/login/log_in" method = "post">
				Email:
				<input type="text" name = "login_email">
				<br>
				Password:
				<input type="password" name = "login_password">
				<br>
				<input type="submit" value = "Sign in" class = "btn btn-success">
			</form>
		</div>

	</div>
	

</body>
</html>