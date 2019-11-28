<?php 
session_start();

if($_COOKIE['usuario']) {
    $_SESSION['usuario'] = $_COOKIE['usuario'];
}

if(!$_SESSION['usuario']) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/estilo.css">
    <link rel="stylesheet" href="recursos/css/email.css">
    <title>GoDev</title>
</head>
<body>
    <header class="cabecalho">
        <h1>GoDev</h1>
        <h2>^^</h2>
    </header>
    <nav class="navegacao">
        <span class="usuario">Usuário: <?= $_SESSION['usuario'] ?></span>
        <a href="logout.php" class="vermelho">Sair</a>
    </nav>
    <main class="principal">
    <?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
echo "cadu";

require_once 'class.phpmailer.php';
echo "cadu2";

$mail = new PHPMailer(true);

try {
    echo "cadu3";

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'carloseduardo.sousa@decisaosistemas.com.br';                     
    $mail->Password   = 'kduzor159';                            
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Port       = 465;                                    

    $mail->setFrom('kduzor@gmail.com', 'Mailer');
    $mail->addAddress('kduzor@gmail.com', 'Joe User');     
    $mail->addAddress('kduzor@gmail.com');               
    $mail->addReplyTo('kduzor@gmail.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

 echo"cadu";

  
    $mail->isHTML(true);                                  
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo "cadu";
}?>
    </main>
    <footer class="rodape">
        Cadu © <?= date('Y'); ?>
    </footer>
</body>
</html>