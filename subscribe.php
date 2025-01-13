<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);

        try {
            // SMTP Server Configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'shakshiadarkar10@gmail.com'; 
            $mail->Password = 'lhtw eaoe cmmn aezf'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Email Configuration
            $mail->setFrom('no-reply@salesforceben.com', 'SF BEN');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Thank You for Subscribing!';
            $mail->Body = "
            <html>
            <head>
              <title>Thank You for Subscribing!</title>
            </head>
            <body>
              <h2>Thank You for Subscribing to Our Newsletter!</h2>
              <p>We're excited to have you on board.</p>
              <p>You'll receive updates, tips, and exclusive offers straight to your inbox.</p>
              <p>Best regards,<br>SF BEN Team</p>
            </body>
            </html>
            ";

            $mail->send();
            echo "Thank you for subscribing! A confirmation email has been sent to your inbox.";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Invalid email address. Please enter a valid email.";
    }
} else {
    echo "Invalid request method.";
}
?>
