<?php 
  
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
  
require ('../vendor/autoload.php'); 
require ('../credentials.php');
  
$mail = new PHPMailer();   
try { 
    $mail->SMTPDebug = 2;                                        
    $mail->isSMTP();                                             
    $mail->Host       = 'smtp.gmail.com;';                     
    $mail->SMTPAuth   = true;                              
    $mail->Username   = '$email_address';                 
    $mail->Password   = '$password';                         
    $mail->SMTPSecure = 'tls';                               
    $mail->Port       = 587;   
  
    $mail->setFrom('$email_address', 'Subhasree');
    $mail->addAddress($_POST["email"]); 
       
    $mail->isHTML(true);                                   
    $mail->Subject = 'Confermation Mail'; 
    $mail->Body    = '<b>Welcome</b> '; 
    $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
    $mail->send(); 
    echo "Mail has been sent successfully!"; 
    } catch (Exception $e) { 
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
    } 
  
?>      