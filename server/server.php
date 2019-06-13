<?php
class registerUsers {
    function setData($name, $password, $email, $userType) {

        $dbInfo = array(
            'host' => 'localhost',
            'user' => 'root',
            'pass' => '',
            'database' => 'users'
        );

        if(empty($name) || empty($password) || empty($email) || empty($userType)) {
            throw new SoapFault("Server", "Error! You must send all fields.");
            exit;
        }

        $name = htmlspecialchars(trim($name));
        $password = md5(htmlspecialchars(trim($password)));
        $email = htmlspecialchars(trim($email));
        $userType = htmlspecialchars(trim($userType));

        $connect = mysqli_connect($dbInfo['host'], $dbInfo['user'], $dbInfo['pass'], $dbInfo['database']) or die(mysqli_error());
        $sqlQuery = "INSERT INTO users (name, password, email, userType) VALUES ('$name', '$password', '$email', '$userType')";
        $result = mysqli_query($connect, $sqlQuery) or die(mysqli_error());
        return "Success! All data sent to database!";
    }

    function getUsers() {

        $dbInfo = array(
            'host' => 'localhost',
            'user' => 'root',
            'pass' => '',
            'database' => 'users'
        );

        $connect = mysqli_connect($dbInfo['host'], $dbInfo['user'], $dbInfo['pass'], $dbInfo['database']) or die(mysqli_error());
        $sqlQuery = "SELECT name, email, userType FROM users";
        $result = mysqli_query($connect, $sqlQuery) or die(mysqli_error());
        $resultArray = mysqli_fetch_all($result);

        if(!$resultArray) {
            throw new SoapFault("Server", "Not users!");
        }
        return $resultArray;
    }
}

//ini_set("soap.wsdl_cache_enabled", "0");

$server = new SoapServer("http://soap.local/users.wsdl");
$server->setClass("registerUsers");
$server->handle();
