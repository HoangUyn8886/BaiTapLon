<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon.ico">
    <title>Search</title>
</head>
<body>
    
</body>
</html>
