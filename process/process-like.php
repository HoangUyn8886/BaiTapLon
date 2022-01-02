<?php
include "./connectDB.php";
$conn = connectDB();

$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];
$action = $_POST['action'];

mysqli_close($conn);
?>
