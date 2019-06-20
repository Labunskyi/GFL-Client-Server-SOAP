<?php
include ('../config.php');
function treatment($data) {
    htmlspecialchars(stripslashes(trim($data)));
    return $data;
}
if($_POST) {
    
    $brand = treatment($_POST['brand']);
    $model = treatment($_POST['model']);
    $capacity = treatment($_POST['capacity']);
	$year = treatment($_POST['year']);
	$colour = treatment($_POST['colour']);
	$speed = treatment($_POST['speed']);
	$price = treatment($_POST['price']);
}

$client = new SoapClient(WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));

try {
    $result = $client->getCars();

	$error = '';
	if (isset($brand, $model, $capacity, $year, $colour, $speed, $price)) {
		if (strlen($year) !== 0) {
			$find = $client->findCar($brand, $model, $capacity, $year, $colour, $speed, $price);
			//print_r($find);
			//die;
		} else { $error = "Error! Fill the year field please"; }
	}
	
	
} catch (SoapFault $e) {
    echo "<p style='text-align: center;padding-top: 30px;font: 25px Verdana;'>".$e->getMessage()."</p>";

}
include ('../templates/cars.php');
?>