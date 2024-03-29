<!doctype html>
<html lang="en"">
<head>
    <meta charset="UTF-8">
    <title>List of cars</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <p class="link"><a href="index.php">Go to start page</a></p>
		
		<table class="table table-bordered">
		<thead>
			<tr>	
				<th scope="col">Id</th>
				<th scope="col">Brand</th>
				<th scope="col">Model</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<?php if (isset($result)) {
			foreach ($result as $res) {
				foreach ($res as $r) { ?>

					<tr>
						<td><?=$r->CarId?></td>
						<td><?=$r->Brand?></td>
						<td><?=$r->Model?></td>
						<td>
							<a href="/client/car/?car=<?=$r->CarId?>"><button class="btn btn-sm btn-primary"> Show </button></a>
						</td>
					</tr>
			
			<?php	}
			}
		}
		?>

		</table>
	<form class="col-md-4" action=""  method="POST" style="padding-left: 0px;">
        <h1>Find a car</h1>
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
		<div style="color: red;">
			<b><?=$error?></b>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="colour" placeholder="Colour">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="speed" placeholder="Max speed">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="price" placeholder="Price">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="submit" value="Find">
		</div>
    </form>
		
	<table class="table table-bordered">
		<thead class="thead-dark">
			<tr>
				<th>Brand</th>	
				<th>Model</th>
				<th>Year</th>
				<th>Capacity</th>
				<th>Colour</th>
				<th>Speed</th>
				<th>Price</th>
			</tr>
		</thead>
		<?php if (isset($find)) {
			foreach ($find as $res) {
				foreach ($res as $r) { ?>
					<tr>
						<td><?=$r->Brand?></td>
						<td><?=$r->Model?></td>
						<td><?=$r->Year?></td>
						<td><?=$r->Capacity?></td>
						<td><?=$r->Color?></td>
						<td><?=$r->Speed?></td>
						<td><?=$r->Price?>$</td>
					</tr>
			<?php	}
			}
		} 
		?>

		</table>
    </div>
</body>
</html>
