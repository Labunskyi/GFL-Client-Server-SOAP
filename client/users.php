<?php
$client = new SoapClient("http://soap.local/users.wsdl", array('cache_wsdl' => WSDL_CACHE_NONE));
try {
    $result = $client->getUsers();
}catch (SoapFault $e) {
    echo "<p style='text-align: center;padding-top: 30px;font: 25px Verdana;'>".$e->getMessage()."</p>";
    echo "<p style='text-align: center;' class=\"link\"><a href=\"index.php\">Go to start page</a></p>";
    exit;
}
?>


<!doctype html>
<html lang="en"">
<head>
    <meta charset="UTF-8">
    <title>List of users</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <p class="link"><a href="index.php">Go to start page</a></p>
        <table class="users-list">
            <tr class="thead">
                <td>Name</td>
                <td>Email</td>
                <td>User type</td>
            </tr>
            <?php
                if(count($result->item) == 1) {
                    $oneItem = $result->item->item;
                    echo "<tr>";
                    foreach ($oneItem as $item) {
                        echo "<td>";
                        echo $item;
                        echo "</td>";
                    }
                    echo "</tr>";
                } else {
                    foreach ($result->item as $item) {
                        echo "<tr>";
                        foreach ($item->item as $resultItem) {
                            echo "<td>";
                            echo $resultItem;
                            echo "</td>";
                        }
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </div>
</body>
</html>
