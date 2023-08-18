<?php
// ini_set('display_errors', 1);
session_start();
include('../connection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

$mail = new PHPMailer(true);


// if (!isset($_SESSION['u_email']) && !isset($_SESSION['u_pass']) && !isset($_SESSION['u_name'])) {
//     header('location:../index.php');
//     exit();
// }

$user_name = $_GET['user_name'];
$user_email = $_GET['u_email'];
$user_pass = $_GET['u_pass'];
$user_number = $_GET['u_number'];
$user_picture = $_GET['u_pic'];

$insert_query = "INSERT INTO `user`(`u_name`, `user_email`, `u_password`, `u_profile`, `u_contact`) VALUES
     ('$user_name', '$user_email', '$user_pass','$user_picture','$user_number')";

$query_run = mysqli_query($conn, $insert_query);

if ($query_run) {

    $code_gen = rand(10000, 99999);

    try {
        //Server settings
        // $mail->SMTPDebug = 2; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'soccer.club.techwiz@gmail.com'; //SMTP username
        $mail->Password = 'utlettxkuvsxbwkl'; //SMTP password
        $mail->SMTPSecure = 'ssl'; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`



        //Recipients
        $mail->setFrom('soccer.club.techwiz@gmail.com', 'Soccer Club');
        $mail->addAddress($user_email, $user_name); //Add a recipient


        $body = "<p>Hello <b>" . $username . "!</b> Your verification code: " . $code_gen . "</p><br><p><b>Call: +923362100225</b></p><br><br><p>Best Regards,<br> <b>Soccer Club</b></p>";

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Verification Code | Soccer Club';
        $mail->Body = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        $_SESSION['code'] = $code_gen;

        echo 'Message has been sent';
        echo "<script>alert('Form submitted successfuly')</script>";
        header('location:code_verification.php');
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
