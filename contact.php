<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

$error="";
if(isset($_POST['submit']))
{
    function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        //smtp settings
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        // Gmail ID which you want to use as SMTP server
        $mail->Username = "your_mail@gmail.com";
        // Gmail Password
        $mail->Password = 'PASSWORD';
        $mail->Port= 465;
        $mail->SMTPSecure = "ssl";

        //email settings
        $mail->isHTML(true);
        $mail->setFrom($from,$from_name);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if(!$mail->send())
        {
            $error= "Mail didn't sent";
            return $error;
        }
        else {
            $error= "Mail sent";
            return $error;
        }
    }
    // Email ID from which you want to send the email
    $from = $_POST['email'];
    $name = $_POST['firstname'];
    $subj = $_POST['subject'];
    $msg = $_POST['message'];

    $to = $_POST['email'];
    $error=smtpmailer($to,$from, $name ,$subj, $msg);
}

?>