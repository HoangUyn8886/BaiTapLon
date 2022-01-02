<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
}
include './connectDB.php';
include './uploadImg.php';

$conn = connectDB();

$title = $_POST['text_content_post'];
$image = $_FILES['content_image'];
$user_id = $_SESSION['user_id'];

echo "insert into post (title,image,user_id) values ('$title',".$image['name'].",'$user_id')";


mysqli_close($conn);
