<?php

require ("../core/connection.php");
require ("../core/scripts/phpmailer/Exception.php");
require ("../core/scripts/phpmailer/PHPMailer.php");
require ("../core/scripts/phpmailer/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;


$user_name = $_POST["inputName"];
$email = $_POST["inputEmail"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$password_hash = password_hash($_POST["inputPass"], PASSWORD_DEFAULT);

$activation_hash = md5($email.time());

$connection = UsersDatabaseConnection::ConnectTo_UserDatabase();
$statement = $connection->prepare('INSERT INTO librarians(user_name, email, password_hash, account_activated, activation_hash) VALUES(:user_name, :email, :password_hash, 0, :activation_hash)');

$statement->bindParam(':user_name', $user_name, PDO::PARAM_STR);
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->bindParam(':password_hash', $password_hash, PDO::PARAM_STR);
$statement->bindParam(':activation_hash', $activation_hash, PDO::PARAM_STR);
$statement->execute();

$from = 'no-reply@library-management.com';
$from_name = "Library Management System";
$subject = 'Library Management System | Email Address Verification';
$message = '

Thank you for signing up on Library Management System by Adeel Ahmed. <br><br>

Your account has been created, but first you need to activate your account before you can log in.<br><br>

You can activate your account by clicking on this link: http://'.$_SERVER["SERVER_NAME"].'/library-management/verify.php?activation_id='.$activation_hash . '

<br><br>

If clicking the link does not work, copy and paste it into your browser.

<br><br>

Regards, <br>
Adeel Ahmed <br>
Library Management Admin <br><br>

Note: This is a computer generated email. Please do not reply to this email.
';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->isHTML(true);
$mail->Username = "mirzadisposable@gmail.com";
$mail->Password = "GmailMirzaGhalibGmail";
$mail->setFrom('no-reply@library-management.com', $from_name);
$mail->Subject = $subject;
$mail->Body = $message;
$mail->addAddress($email);

if ($mail->send())
{
    save_mail($mail);
} 



// Saving an archive copy of activation email sent to the user
function save_mail($mail)
{ 
    //You can change 'Library Management Activation Emails' to any other folder or tag such as 'Sent Mail'
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
    
    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    //Append the email sent to the user to the message
    imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

}

ignore_user_abort(true);

?>