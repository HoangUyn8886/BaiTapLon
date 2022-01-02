<?php
    session_start();

    // Đăng nhập
    include './connectDB.php';
    include '../send-email/sendEmail.php';

    //Kiểm tra xem có email và password được gửi lên từ client không
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        //Kết nốt tới cơ sở dữ liệu , tạo câu truy vấn tìm password của email được gửi lên
        $conn = connectDB();       
        $sql = "select password from user where email = '$email'";

        $result = mysqli_query($conn,$sql);

        // Lấy số hàng trả về của câu truy vấn
        $count = mysqli_num_rows($result);

        // Nếu tìm thấy , số hàng Database trả về là 1
        if($count == 1){

            // tạo 1 mảng row từ dữ liệu database trả về , (hằng số MYSQLI_NUM để biến mảng này thành mảng truy cập index)
            $row = mysqli_fetch_array($result,MYSQLI_NUM);

            //câu truy vấn bên trên chỉ tìm password nên mảng trả về chỉ có 1 phần tử là row[0]
            $password_hash = $row[0];

            //Lấy mật khẩu đã bị mã hóa trên Database về verify, so sánh với mật khẩu người dùng nhập
            
        else{
            // Nếu không tìm thấy tài khoản email này trên DataBase
            $_SESSION['notify_signin']='Tài khoản này không tồn tại';
            header('Location: ../index.php');

        }
        mysqli_close($conn);
    }
?>
