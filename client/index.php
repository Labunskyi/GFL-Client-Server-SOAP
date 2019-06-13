<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users information system!</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
</head>
<body>
<div class="container">
    <form id="add-user" action="client.php" method="POST">
        <h1>You can to add a new user to the system!</h1>
        <select name="userType">
            <option value="Admin">Administrator</option>
            <option value="User">User</option>
        </select><br>
        <input type="text" name="name" placeholder="Name"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="submit" value="Add user">
    </form>
    <p class="link"><a href="users.php">Get all users info</a></p>
</div>
</body>
</html>
