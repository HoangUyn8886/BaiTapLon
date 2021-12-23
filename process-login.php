<?php
//tạo session: mặc đinh mỗi phiên làm việt có thời hạn ngắn 
session_start();
//kiểm tra người dùng đã đăng nhập chưa 
if(isset($_POST['btnSignIn'])){
    $email = $_POST('txtEmail');
    $pass = $_POST('txtPass');

// kiểm tra người dùng có nhập ko 

// B1 kết nối data


// B2 thực hiện truy vấn 
    $sql = "SELECT * FROM  ....(tên cơ sở dữ liệu) WHERE email = 
    '$email' AND matkhau = '$pass' ";
//vấn đề về tính hợp lệ của dữ liệu vào form 
//Lỗi nghiêm trọng: lỗi SQL
    $result = mysqli_query($conn,$sql);
    if(mysqli_mun_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $pass_hash= $row['matkhau'];
        if (password_verify($pass,$pass_hash)){
            // cấp thẻ làm việc
            $_SESSION['isloginok'] = $email;
            header("location : adim.php");//chuyển về trang quản trị 
        }else{
            
            $error = "bạn nhập thông tin chưa chính sác";
            header("location : login.php?error=$error");// chuyển hướng thông báo lỗi 
        }
        // cấp thẻ làm việc
        $_SESSION['isloginok'] = $email;
        header("location : adim.php");//chuyển về trang quản trị 
    }
    else{
        $error = "bạn nhập thông tin chưa chính sác";
        header("location : login.php?error=$error");// chuyển hướng thông báo lỗi 
    }
//B3 đóng kết nối 
    mysqli_close($conn);
}
else {
    hearder("location:login.php");
}
?>