<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
}
include "./process/connectDB.php";
$conn = connectDB();
?>
<?php 
$user_id = $_SESSION['user_id'];
$sql_myself = "select * from user where user_id = '$user_id'";
$result_myself = mysqli_query($conn, $sql_myself);
$row_myself = mysqli_fetch_array($result_myself, MYSQLI_NUM);
$avatar = $row_myself[6];
$fullname = $row_myself[3];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon.ico">
    <title>Những người thích bài viết của bạn</title>
    <link rel="stylesheet" href="./assets/css/all.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/home.css">
    <link rel="stylesheet" href="./assets/css/friendly.css">
</head>

<body>
    <?php
    include './partials/header.php';
    ?>


    <div class="container">

        <div class="component1">

            <a href="./user.php" class="item_component1">
                <img id="avatar_main" <?php echo "src='$avatar'" ?> alt="avatar">
                <span id="name_main"><?php echo $fullname; ?></span>
            </a>
            <a href="./friendly.php" class="item_component1">
                <img class="hobby_img" src="./assets/img/hobby.png" alt="hobby">
                <span>Nguời quan tâm bạn</span>
            </a>
        </div>


        <div class="component2">
            <div class="people_like_title">Những người quan tâm bài viết của bạn</div>
            <div class="people_like_main">

                <?php
                // lấy ra id của những người  đã like bài viết
                $sql_get_id_user_like = "select react.user_id from react where react.post_id = 
                (select post.post_id from post where post.user_id = '$user_id')";
                $result_get_id_user_like = mysqli_query($conn, $sql_get_id_user_like);
                $count_id_user_like = mysqli_num_rows($result_get_id_user_like);
                if ($count_id_user_like < 1) {
                    echo "<h2> Không có ai :((( </h2>";
                }
                else{
                while ($row_get_id_user_like = mysqli_fetch_array($result_get_id_user_like, MYSQLI_NUM)) {


                    //sql lấy ra những người đã like bài viết của bạn
                    $sql_get_all_like_me = "select * from user where user_id = '$row_get_id_user_like[0]'";
                    $result_like_me = mysqli_query($conn, $sql_get_all_like_me);

                    $count_like_me = mysqli_num_rows($result_like_me);
                    if ($count_like_me > 0) {
                        while ($row_like_me = mysqli_fetch_array($result_like_me)) {

                ?>
                            <a class="a_people" <?php echo "href='./user.php?user_id=$row_like_me[0]'" ?>>
                                <img <?php echo "src='$row_like_me[6]'" ?> alt="avatar">
                                <div class="a_people_fullname">
                                    <div class="name_a_people"><?php echo $row_like_me[3] ?></div>
                                    <div class="birthday_a_people"><?php echo $row_like_me[5] ?></div>
                                </div>
                            </a>

                <?php }
                    } else {
                        echo "<h2> Không có ai :((( </h2>";
                    }
                }} ?>
            </div>

        </div>


        <div class="component3">


            <div class="component3_title item_component1 item_component3">Danh sách người dùng</div>

            <?php
            //lay danh sach tat ca nguoi dung, ngoai ban
            $sql_get_all_user = "select * from user where user_id != '$user_id' ";
            $result6 = mysqli_query($conn, $sql_get_all_user);
            while ($row_all_user = mysqli_fetch_array($result6, MYSQLI_NUM)) {
                $user_id_all = $row_all_user[0];
                $user_fullname_all = $row_all_user[3];
                $user_avatar_all = $row_all_user[6];

            ?>

                <a <?php echo "href='./user.php?user_id=$user_id_all'" ?> class="item_component1 item_component3 online">
                    <img <?php echo "src='$user_avatar_all'"; ?> alt="avatar">
                    <span><?php echo $user_fullname_all; ?></span>
                </a>

            <?php } ?>
        </div>
    </div>

</body>

</html>