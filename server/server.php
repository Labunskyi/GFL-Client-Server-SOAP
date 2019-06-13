<?php
class registerUsers {
    function setData($name, $password, $email, $userType) {

        $dbInfo = array(
            'host' => 'localhost',
            'user' => 'user1',
            'pass' => 'user1',
            'database' => 'user1'
        );

        if(empty($name) || empty($password) || empty($email) || empty($userType)) {
            throw new SoapFault("Server", "Error! You must send all fields.");
            exit;
        }

        $name = htmlspecialchars(trim($name));
        $password = md5(htmlspecialchars(trim($password)));
        $email = htmlspecialchars(trim($email));
        $userType = htmlspecialchars(trim($userType));

        $this->connect = new PDO ("mysql:host=localhost;dbname=user1;charset=utf8", 'user1', 'user1') ;
        $sqlQuery = "INSERT INTO users_soap (name, password, email, userType) VALUES ('$name', '$password', '$email', '$userType')";
        $result = $this->connect->query($sqlQuery) ;
        return "Success! All data sent to database!";
    }

    function getUsers() {

        $dbInfo = array(
            'host' => 'localhost',
            'user' => 'user1',
            'pass' => 'user1',
            'database' => 'user1'
        );

        $this->connect = new PDO ("mysql:host=localhost;dbname=user1;charset=utf8", 'user1', 'user1') ;
        $sqlQuery = "SELECT name, email, userType FROM users_soap";
        $result = $this->connect->query($sqlQuery);    
        
        $resultArray = array ();
		while ($row = $result->fetchAll(PDO::FETCH_OBJ) ) {
			$resultArray[] = $row;
        }
        
        return $resultArray;
        
    }
}

//ini_set("soap.wsdl_cache_enabled", "0");

$server = new SoapServer("http://tc.geeksforless.net/~user1/GFL-Client-Server-SOAP/users.wsdl");
$server->setClass("registerUsers");
$server->handle();
