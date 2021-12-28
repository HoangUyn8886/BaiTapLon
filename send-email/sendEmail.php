<?php use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
function sendEmail($email , $tieude , $bodyContent) {
// Khởi tạo và chuyển `true` cho phép các trường hợp ngoại lệ
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;// Enable verbose debug output
    $mail->isSMTP();// gửi mail SMTP
    $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
    $mail->SMTPAuth = true;//Bật xác thực SMTP
    $mail->Username = 'hoanguyen862001@gmail.com';// SMTP username
    $mail->Password = 'iycfatgdwgxnzjlh'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Bật mã hóa TLS; `PHPMailer :: ENCRYPTION_SMTPS` cũng được chấp nhận
    $mail->Port = 587; // TCP port to connect to
    $mail->CharSet = 'UTF-8';
    //Recipients
    $mail->setFrom('hoanguyen862001@gmail.com', 'Mạng xã hội Facebook');

    $mail->addReplyTo('hoanguyen862001@gmail.com', 'Mạng xã hội Facebook');
   
    
            $mail->addAddress($email); // Add a recipient
            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $mail->Subject = $tieude;
            
            // Mail body content 
            $mail->Body = $bodyContent;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // Xóa tất cả địa chỉ và tệp đính kèm cho vòng lặp tiếp theo
            $mail->clearAddresses();
            $mail->clearAttachments();
            return true;
      
    }
catch (Exception $e) {
    return false;
}
}?>
