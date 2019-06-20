<?php
function treatment($data) {
    htmlspecialchars(stripslashes(trim($data)));
    return $data;
}

if (isset($_GET['car'])) {
	$id = $_GET['car'];
}
	$id = !isset($id) ? 0 : $id;
	
if($_POST) {
    
	$carid = $id;
    $name = treatment($_POST['name']);
    $payment = treatment($_POST['payment']);
	
}
		
$client = new SoapClient("http://gfl-client-server-soap.local/cars.wsdl", array('cache_wsdl' => WSDL_CACHE_NONE));
try {
	
	$getCar = $client->getCar($id);
	if (isset($carid, $name, $payment)) {
		$result = $client->setCar($carid, $name, $payment);
		
		echo "<p style='text-align: center;'>".$result."</p>";
	}
}catch (SoapFault $e) {
    echo "<p style='text-align: center;padding-top: 30px;font: 25px Verdana;'>".$e->getMessage()."</p>";

}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car</title>
    <link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <p class="link"><a href="/client/cars">Return to shop</a></p>
		
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
		<?php if (isset($getCar)) {
			foreach ($getCar as $res) {
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
		<h1>Buy a car</h1>
		<form class="col-md-4" method="post" action="" style="padding-left: 0px;">
		  <div class="form-group">
			<input type="hidden" name="carid" value="<?=$id?>">
			<input type="text" class="form-control" name="name" placeholder="Your full name">
			
		  </div>
		  <div class="form-group">
			<select class="form-control" name="payment">
				<option value="cash" name="cash">Cash</option>
				<option value="credit card" name="credit card">Credit card</option>
			</select>
		  </div>

		  <button type="submit" class="btn btn-primary">Buy</button>
		</form>
    </div>
</body>
</html>
