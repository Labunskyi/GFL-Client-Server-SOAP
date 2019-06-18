<?php
$client = new SoapClient("http://gfl-client-server-soap.local/cars.wsdl", array('cache_wsdl' => WSDL_CACHE_NONE));
try {
    $result = $client->getUsers();
}catch (SoapFault $e) {
    echo "<p style='text-align: center;padding-top: 30px;font: 25px Verdana;'>".$e->getMessage()."</p>";

}
?>


<!doctype html>
<html lang="en"">
<head>
    <meta charset="UTF-8">
    <title>List of cars</title>
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <p class="link"><a href="index.php">Go to start page</a></p>
		
		<table class="table table-striped">
			<tr>	
				<th><b>id</b></th>
				<th><b>Brand</b></th>
				<th><b>Model</b></th>
				<th></th>
			</tr>
		<?php if (isset($result->item->item)) {
			$oneItem = $result->item->item;
			//print_r($oneItem);
			}	
			foreach($oneItem as $item) {  ?>
			
			<tr>
				<td><?=$item->CarId?></td>
				<td><?=$item->Brand?></td>
				<td><?=$item->Model?></td>
				
				<td>
					<a href="/client/cars/?=<?=$item->CarId?>"><button class="btn btn-sm btn-primary"> Buy </button></a>
					
				</td>
			</tr>

		<?php } ?>

		</table>
    </div>
</body>
</html>
