
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
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
	.block_small{
		width: 400px;
		margin: 10px 10px 10px 0;
		vertical-align: top;
		display: inline-block;
		border: 1px solid silver;
		border-radius: 20px;
		padding: 20px;
		text-align: center;
		
	}
	h5{
		color: red;
	}
	h4{
		color: blue;
	}
	</style>
</head>
<body>
	<div class = 'container'>
		<?php
			// var_dump($reviews);
			// die();
			if (isset($errors)) {
			 	echo $errors;
		} 
		?>

		<h3>Welcome, <?= $user['name']?> 
			<a href="/books/index" class = 'btn btn-success'>Add Book and Review</a>
			 | <a href="/login/log_off" class = 'btn btn-danger'>Logout</a>
		</h3>
		
		<?php 
				if (isset($errors)) {
				 	echo $errors;
		} 
		?>
		<div class = 'block'>
			<h3>Recent Book Reviews: </h3>
			<?php  
				if (count($reviews)) {
					foreach ($reviews as $key => $review) {
						echo "<h4><a href = '/books/show/{$review['book_id']}'>".$review['title']."</a></h4>";
						echo "<h5>Rating: ".$review['rating']."</h5>";
						echo "<p><a href = '/books/show_user/{$review['user_id']}'>".$review['user_name']."</a> says: "
						.$review['review']."</p>";
						echo "Posted on ".$review['created_at'];
					}
				}
			?>			
		</div>
		<div class = 'block_small'>
			<h3>Other Books with Reviews</h3>
			<?php  
				if (count($book_with_reviews)) {
					foreach ($book_with_reviews as $key => $book) {
						if($book['total_reviews']>0){
							echo "<h4><a href = '/books/show/{$book['id']}'>".$book['title']."</a></h4>";
						}
						
					}
				}
			?>	
		</div>

	</div>
	

</body>
</html>