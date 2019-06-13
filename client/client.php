<?php
function treatment($data) {
    htmlspecialchars(stripslashes(trim($data)));
    return $data;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['name']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['userType'])) {
        echo "<p style='text-align: center;'>Error! You must write all data!</p>";
        echo "<p style='text-align: center;'><a href=\"{$_SERVER['HTTP_REFERER']}\">Go back</a></p>";
        exit;
    }
    $name = treatment($_POST['name']);
    $password = treatment($_POST['password']);
    $email = treatment($_POST['email']);
    $userType = treatment($_POST['userType']);
}

$client = new SoapClient("http://soap.local/users.wsdl", array('cache_wsdl' => WSDL_CACHE_NONE));
try {
    $result = $client->setData($name, $password, $email, $userType);
    echo "<p style='text-align: center;'>".$result."</p>";
    echo "<p style='text-align: center;'><a href=\"{$_SERVER['HTTP_REFERER']}\">Go back</a></p>";
} catch (SoapFault $e) {
    echo $e->getMessage();
    exit;
}
