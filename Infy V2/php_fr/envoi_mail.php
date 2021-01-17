<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
$mail = new PHPMailer(); 
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true)); 
// ignorer l'erreur de certificat.
$mail->Host       = "smtp-g5c.alwaysdata.net";  
$mail->Port       = 587;
$mail->Username   = "g5c@alwaysdata.net";
$mail->Password   = "informatique";        
$mail->From       = htmlspecialchars($_POST['replyto']);
$mail->FromName   = htmlspecialchars($_POST['prenom'].' '.$_POST['nom']);
$mail->Subject    = htmlspecialchars($_POST['sujet']);
$mail->AltBody    = htmlspecialchars($_POST['message']); //Body au format texte
$mail->WordWrap   = 50; // nombre de caractères pour le retour à la ligne automatique
$mail->AddReplyTo(htmlspecialchars($_POST['replyto']),htmlspecialchars($_POST['prenom'].' '.$_POST['nom']));
$mail->AddAddress("g5c@alwaysdata.net");
$mail->MsgHTML(htmlspecialchars($_POST['message']));
$mail->IsHTML(false); 	
if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
header('Location: ../fr/nous_contacter.php?envoi=true');
} 
?>