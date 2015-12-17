
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>show book</title>
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
	.placeholder{
		margin: 0 20px;
	}
	.placeholder_l{
		margin: 0 300px;
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
			<?php
			// var_dump($reviews);
			// die();
				if (isset($errors)) {
				 	echo $errors;
				} 
			?>
			<a href="/login/profile" class = 'btn btn-info'>Home</a>  |  
			<a href="/login/log_off" class = 'btn btn-danger'>Logout</a><hr>
			<h3><?=$book['title']?></h3>
			<h4><?=$book['author']?></h4>
			<hr>
			<div class = 'block'>
				<h3>Reviews</h3>
				<?php
				foreach ($reviews as $key => $review) {
					echo "<p>Rating: ".$review['rating']."</p>";
					echo "<p><a href = '/books/show_user/{$review['user_id']}'>".$review['user_name']."</a> says: ".$review['review']."</p>";
					echo "<p>Posted on ".$review['created_at']."</p>";
					if($review['user_id']==$this->session->userdata('id')){
						echo "<a href = '/books/delete_review/{$review['id']}' class = 'btn btn-danger'>Delete</a>";
					}
					echo "<hr>";
				}
					

				?>
			</div>

			<div class = 'block'>
				<h4>Add a Review</h4>
				<form action="/books/add_review/
				<?=$this->session->userdata('id')?>/<?=$book['id']?>" method = "post">
					Review:
					<input type="text" name = "review">
					<br>
					Rating:
					<input type="number" min = '1', max = '5', name = 'rating'>
					<br>
					<input type="submit" value = "Submit Review" class = 'btn btn-success'>
	
				</form>
			</div>
			

			

			
	</div>
	

</body>
</html>