<?php
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';

require 'phpmailer/src/PHPMailer.php';

require 'phpmailer/src/SMTP.php';


if (isset($_POST['send'])) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'senderemail@gmail.com';
        $mail->Password = 'your-app-password';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8'); 
        $message = htmlspecialchars($_POST["message"], ENT_QUOTES, 'UTF-8');
        $mail->setFrom('senderemail@gmail.com', 'Your Name');
        $mail->addAddress('receiveremail@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Portfolio Contact Form Submission by ' . $email;
        $mail->Body = '
    <h2>Portfolio Contact Form Submission</h2>
    <p><strong>Email:</strong> ' . $email . '</p>
    <p><strong>Message:</strong> ' . nl2br($message) . '</p>';
        $mail->send();

        echo "<script> alert('Email Sent successfully');  
    document.location.href='contact.html';
    
    </script>"

        ;
    } catch (Exception $e) {
        echo "
    <script>
        alert('Mailer Error: " . $mail->ErrorInfo . "');  
        document.location.href = 'contact.html';
    </script>
    ";
    }



}






?>