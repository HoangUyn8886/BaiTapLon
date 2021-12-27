<?php
// session_start();
// if (!isset($_SESSION['signinOK'])) {
//     header('Location: ./index.php');
// }
?>
<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Facebook</title>
    <link rel="stylesheet" href="./assets/css/all.css">
    <link rel="stylesheet" href="./assets/css/modal.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/home.css">
</head>

<body>
    <?php
    include './partials/header.php';
    ?>
    <div class="container">
        <div class="component1">
            <a href="user.php" class="item_component1">
                <img src="assets/img/avt_null.jpg" alt="avatar" srcset="assets/img/avt_null.jpg">
                <span>Hoàng Thị Thu Uyên</span>
            </a>
            <a href="hobby.php" class="item_component1">
                <img class="hobby_img" src="assets/img/hobby.png" alt="hobby">
                <span>Nhóm sở thích</span>
            </a>
        </div>
        <div class="component2">
            <div class="component2_title">
                <div class="box_component2_img">
                    <img src="assets/img/avt_null.jpg" alt="avatar" srcset="assets/img/avt_null.jpg">
                </div>
                <input id="toogle_modal" type="text" placeholder="Hoàng Thị Thu Uyên ơi, bạn đang nghĩ gì thế?">
            </div>
        </div>


        <div class="component3">
            <div class="component3_title item_component1 item_component3">Danh sách người dùng</div>
            <a href="user.php" class="item_component1 item_component3 online">
                <img src="assets/img/avt_null.jpg" alt="avatar" srcset="assets/img/avt_null.jpg">
                <span>Ami Quỳnh</span>
            </a>

            <a href="user.php" class="item_component1 item_component3 online">
                <img src="assets/img/avt_null.jpg" alt="avatar" srcset="assets/img/avt_null.jpg">
                <span>Hà Quang Tiến</span>
            </a>


            <a href="user.php" class="item_component1 item_component3 online">
                <img src="assets/img/avt_null.jpg" alt="avatar" srcset="assets/img/avt_null.jpg">
                <span>Mei Mey</span>
            </a>
        </div>
    </div>


    <!-- Modal post -->
    <div id="modal">
        <div id="box_modal">
            <div id="close_modal"></div>
        </div>
    </div>


    <script src="javascript/modal.js"></script>
    <script>
        const toogle_modal = document.querySelector('#toogle_modal') /* lấy phần tử đầu tiên trong tài liệu vs id toogle_modal*/
        toogle_modal.onfocus = (e) => {
            toogle_modal.blur();
        }
    </script>
</body>

</html>
