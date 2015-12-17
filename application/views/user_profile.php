
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Profile</title>
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
	</style>
</head>
<body>
	<div class = 'container'>
		<?php
			// var_dump($user);
			// var_dump($user_review_info);
			// var_dump($user_review_book_info);
			// die();
			if (isset($errors)) {
			 	echo $errors;
		} 
		?>
		<a href="/login/profile" class = 'btn btn-info'>Home</a>  |  
		<a href="/books/index" class = 'btn btn-warning'>Add Book and Review</a>  |  <a href="/login/log_off" class = 'btn btn-danger'>Logout</a><hr>
		<h4>User Alias: <?=$user['alias']?></h4>
		<h4>Name: <?=$user['name']?></h4>
		<h4>Email: <?=$user['email']?></h4>
		<h4>Total reviews: <?=$user_review_info['total_reviews']?></h4>
		<hr>
		<h4>Posted reviews on the following books: </h4>
		<?php  
			if(count($user_review_book_info)){
				foreach ($user_review_book_info as $key => $book) {
					echo "<p><a href = '/books/show/{$book['book_id']}'>".$book['title']."</a></p>";
				}
			}

		?>
	</div>
	

</body>
</html>