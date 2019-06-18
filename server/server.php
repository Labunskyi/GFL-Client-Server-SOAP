<?php
class registerUsers {
    function setData($brand, $model, $capacity, $year, $colour, $speed, $price) {

        $this->connect = new PDO ("mysql:host=localhost;dbname=users;charset=utf8", 'root', '') ;
        $sqlQuery = "INSERT INTO car (brand, model, capacity, year, colour, speed, price) VALUES ('$brand', '$model', '$capacity', '$year',
		'$colour', '$speed', '$price')";
        $result = $this->connect->query($sqlQuery) ;
        return "Success! All data sent to database!";
    }

    function getUsers() {

        $this->connect = new PDO ("mysql:host=localhost;dbname=users;charset=utf8", 'root', '') ;
        $sqlQuery = "SELECT * FROM car";
        $result = $this->connect->query($sqlQuery);    
        
        $resultArray = array ();
		while ($row = $result->fetchAll(PDO::FETCH_OBJ) ) {
			$resultArray[] = $row;
        }
        
        return $resultArray;
        
    }
}

$server = new SoapServer("http://gfl-client-server-soap.local/cars.wsdl");
$server->setClass("registerUsers");
$server->handle();
