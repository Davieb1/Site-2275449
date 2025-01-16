<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['submitContact'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Your email details
    $recipient_email = "daviebirrell28@gmail.com";
    $smtp_host = "smtp.gmail.com"; // Replace with your SMTP host
    $smtp_username = "daviebirrell28@gmail.com";
    $smtp_password = "gqujrschmiwvxfze"; // Use App Password here if required

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['status'] = "Invalid email address.";
            header("Location: {$_SERVER["HTTP_REFERER"]}");
            exit();
        }

        // Configure PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = $smtp_host;
            $mail->SMTPAuth   = true;
            $mail->Username   = $smtp_username;
            $mail->Password   = $smtp_password;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom($smtp_username, 'Sender Name');
            $mail->addAddress($recipient_email, 'Recipient Name'); // Use recipient email variable

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Website Enquiry - TrainSync Contact Form';
            $mail->Body    = '<h3>Hello, you have a new website enquiry</h3>
                <h4>Name: ' . $name . '</h4>
                <h4>Email: ' . $email . '</h4>
                <h4>Message: ' . $message . '</h4>';

            // Send the email and handle response
            if ($mail->send()) {
                $_SESSION['status'] = "Thank you for contacting us - Team TrainSync";
                header("Location: {$_SERVER["HTTP_REFERER"]}");
                exit();
            } else {
                $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                header("Location: {$_SERVER["HTTP_REFERER"]}");
                exit();
            }

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } 
} else {
    header('Location: index.php');
    exit();
}

?>
