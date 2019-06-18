<?php
function treatment($data) {
    htmlspecialchars(stripslashes(trim($data)));
    return $data;
}
if($_POST) {
    
	$id = $_POST['id'];
    $brand = treatment($_POST['brand']);
    $model = treatment($_POST['model']);
    $capacity = treatment($_POST['capacity']);
	$year = treatment($_POST['year']);
	$colour = treatment($_POST['colour']);
	$speed = treatment($_POST['speed']);
	$price = treatment($_POST['price']);
	print_r($_POST);
}

$client = new SoapClient("http://gfl-client-server-soap.local/cars.wsdl", array('cache_wsdl' => WSDL_CACHE_NONE));
try {

	if (isset($brand, $model, $capacity, $year, $colour, $speed, $price)) {
    $result = $client->setData($brand, $model, $capacity, $year, $colour, $speed, $price);
    echo "<p style='text-align: center;'>".$result."</p>";
    }
} catch (SoapFault $e) {
    echo $e->getMessage();
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/common.js"></script><meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <form id="add-user" action="" method="POST">
        <h1>Add a new car</h1>
		<input type="hidden" name="id">
        <input type="text" name="brand" placeholder="Brand"><br>
        <input type="text" name="model" placeholder="Model"><br>
		<input type="text" name="capacity" placeholder="Capacity"><br>
		<input type="text" name="year" placeholder="Year"><br>
		<input type="text" name="colour" placeholder="Colour"><br>
		<input type="text" name="speed" placeholder="Max speed"><br>
		<input type="text" name="price" placeholder="Price"><br>
        <input type="submit" name="submit" value="Add car">
    </form>
    <p class="link"><a href="cars.php">Get all cars</a></p>
</div>
</body>
</html>