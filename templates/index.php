<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <form class="col-md-4" action=""  method="POST">
        <h1>Add a new car</h1>
		<div class="form-group">
			<input type="text" class="form-control" name="brand" placeholder="Brand">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="model" placeholder="Model">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="capacity" placeholder="Capacity">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="year" placeholder="Year">
		</div>
		<div class="form-group">
			<select class="form-control" name="colour">
				<option >Please select colour</option>
				<option value="1" name="cash">White</option>
				<option value="2" name="cash">Red</option>
				<option value="3" name="cash">Black</option>
				<option value="4" name="cash">Blue</option>
			</select>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="speed" placeholder="Max speed">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="price" placeholder="Price">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="submit" value="Add car">
		</div>
    </form>
    <p class="link"><a href="cars.php">Get all cars</a></p>
</div>
</body>
</html>