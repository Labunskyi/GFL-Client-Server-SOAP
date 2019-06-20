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

	if (isset($brand, $model, $capacity, $year, $colour, $speed, $price)) {
    $result = $client->setData($brand, $model, $capacity, $year, $colour, $speed, $price);
	
	echo "<p style='text-align: center;'>".$result."</p>";
    }
} catch (SoapFault $e) {
    echo $e->getMessage();
    exit;
}

include ('../templates/index.php');
?>