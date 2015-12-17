
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add new book</title>
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
	.navbar{
		border-bottom: 1px solid black;
		font-size: 20px;
	}
	.placeholder{
		margin: 0 20px;
	}
	.placeholder_l{
		margin: 0 300px;
	}
	</style>
</head>
<body>
	<div class = 'container'>
		<?php
			if (isset($errors)) {
			 	echo $errors;
		} 
		?>
		<h3>Add a New Book Title and a Review</h3>
		<a href="/login/profile" class = 'btn btn-info'>Home</a>
		 | <a href="/login/log_off" class = 'btn btn-danger'>Logout</a>
		<form action="/books/add_book/<?=$this->session->userdata('id')?>"
			method = "post">
			Book Title:
			<input type="text" name = "title">
			<br>
			Author:
			<select name="author">
				<option value="Stephen King">Stephen King</option>
				<option value="Hugo">Hugo</option>
				<option value="Chairman Mao">Chairman Mao</option>
			</select>
			<br>
			Review:
			<input type="text" name = "review">
			<br>
			Rating:
			<input type="number" min = '1', max = '5', name = 'rating'>
			<br>
			<input type="submit" value = "Add Book and Review" class = 'btn btn-success'>
		</form>
	</div>
	

</body>
</html>