<?php
class registerCars {
	
	public function __construct() {
		include ('../config.php');
		$this->connect = new PDO ("mysql:host=" . HOST . ";dbname=" . DB_NAME . ";charset=utf8", USER, PASSWORD);
	}
	
    function setData($brand, $model, $capacity, $year, $colour, $speed, $price) {

        $sqlQuery = "INSERT INTO car (brand, model, capacity, year, colour, speed, price) VALUES ('$brand', '$model', '$capacity', '$year',
		'$colour', '$speed', '$price')";
        $result = $this->connect->query($sqlQuery) ;

        return "Success! All data sent to database!";
    }
	
	function setCar($carid, $name, $payment){
	
        $sqlQuery = "INSERT INTO `order` (`carid`, `name`, `payment`) VALUES ('$carid', '$name', '$payment')";
        $result = $this->connect->query($sqlQuery) ;
       
        return "Success! You buy this car!";
		
	}

    function getCars() {

        $sqlQuery = "SELECT * FROM car INNER JOIN colour ON car.colour = colour.colourid ORDER BY carid ASC";
        $result = $this->connect->query($sqlQuery);    
        
        $resultArray = array ();
		while ($row = $result->fetchAll(PDO::FETCH_OBJ) ) {
			$resultArray[] = $row;
        }
        return $resultArray;
    }
	
	function getCar($id) {
		
		$sqlQuery = "SELECT * FROM car INNER JOIN colour ON car.colour = colour.colourid where carid = '$id'";
        $result = $this->connect->query($sqlQuery);    
        
        $resultArray = array ();
		while ($row = $result->fetchAll(PDO::FETCH_OBJ) ) {
			$resultArray[] = $row;
        }
        return $resultArray;
		
	}
	
	public function findCar($brand, $model, $capacity, $year, $colour, $speed, $price) {
        
        $sqlQuery = "SELECT car.Carid, car.Brand, car.Model, car.Capacity, car.Year, car.Speed, car.Price, colour.Color FROM `car` INNER JOIN colour ON car.Colour = colour.Colourid WHERE `brand` LIKE '%{$brand}%' AND `model` LIKE '%{$model}%' 
        AND `capacity` LIKE '%{$capacity}%' AND `year` = '$year' AND `color` LIKE '%{$colour}%' 
        AND `speed` LIKE '%{$speed}%' AND `price` LIKE '%{$price}%'";
        $result = $this->connect->query($sqlQuery);
		
		$resultArray = array ();
		while ($row = $result->fetchAll(PDO::FETCH_OBJ) ) {
			$resultArray[] = $row;
        }
        
        return $resultArray;
	}
}

$server = new SoapServer("http://gfl-client-server-soap.local/cars.wsdl");
$server->setClass("registerCars");
$server->handle();
