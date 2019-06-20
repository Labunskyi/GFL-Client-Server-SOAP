<?php
include ('../config.php');
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
		
$client = new SoapClient(WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
try {
	
	$getCar = $client->getCar($id);
	if (isset($carid, $name, $payment)) {
		$result = $client->setCar($carid, $name, $payment);
		
		echo "<p style='text-align: center;'>".$result."</p>";
	}
}catch (SoapFault $e) {
    echo "<p style='text-align: center;padding-top: 30px;font: 25px Verdana;'>".$e->getMessage()."</p>";

}
include ('../templates/car.php');
?>