<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
$mail = new PHPMailer(); 
echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."<br>";
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->CharSet = "utf-8";
$mail->Host       = "mail.gmx.com";  
$mail->Port       = 587;
$mail->Username   = "infy@gmx.fr";
$mail->Password   = "J5SvCdZ2!eWra24";        
$mail->From       = htmlspecialchars('infy@gmx.fr');
$mail->FromName   = htmlspecialchars($_POST['prenom'].' '.$_POST['nom']);
$mail->Subject    = htmlspecialchars($_POST['sujet']);
$mail->AltBody    = htmlspecialchars($_POST['message']); //Body au format texte
$mail->WordWrap   = 50; // nombre de caractères pour le retour à la ligne automatique
$mail->AddReplyTo(htmlspecialchars($_POST['replyto']),htmlspecialchars($_POST['prenom'].' '.$_POST['nom']));
$mail->AddAddress("infy@gmx.fr");
$mail->MsgHTML(htmlspecialchars($_POST['message']));
$mail->IsHTML(true); 	
if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
header('Location: ../vues_fr/nous_contacter.php?envoi=true');
} 
?>
