<?php

    //smtp configuration
    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.mailtrap.io';
    $mail->Port = 2525;
    $mail->SMTPAuth = true;
    $mail->Username = '2d50da90e25ad5';
    $mail->Password = '4b7213e900fad1';

    //gettings form informationss
    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail->Subject = $subject;
    $mail->setFrom($email, $name);
    $mail->addAddress('youremail@exemple.com', 'Contact Forme');
    $mail->addReplyTo($email, $name);
    $mail->isHTML(false);
    $mail->Body = $message;

    if(!$mail->send())
    {
        echo "error";
    }
    else
    {
        echo "success";
    }


