<?php
 define ("IndexLoaded", true);
 include '../includes/init.php'; 
 sec_session_start();
 
require 'PHPMailer\PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
$mail->Port = 465;  
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ingsoft3mailer@gmail.com';                 // SMTP username
$mail->Password = '1a2s3d4f5g6h';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted

//$mail->SMTPDebug = 3;
$mail->From = 'ingsoft3mailer@gmail.com';
$mail->FromName = 'Recordador de Medicaciones';
$mail->addAddress('lucas.marc@gmail.com', 'Lucas Marc');
$mail->addAddress('jarpa07@gmail.com', 'Lucas Jarpa ');
$mail->addAddress('ima08_11@hotmail.com', 'Imanol Alvarez');
$mail->addAddress('sruizdiaz1985@gmail.com', 'Silvia Ruiz Diaz');

$mail->WordWrap = 50;                               // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Recordatorio de medicación - Tomar ' . $_POST['medicamento'];
$mail->Body    = 'Debe tomar ' . $_POST['dosis'] . " de " . $_POST['medicamento'] . " en este horario: " . date("Y-m-d H:i:s") /*. "<br><br> Haga click <a href='http://" . View::baseUrl() . "/controller/medicamentoTomado.php?idMedicamento=" . $_POST['idMedicamento'] . "&dosis=" . $_POST['dosis'] . "&idAlerta=" . $_POST['idAlerta'] . "&seRepite=" . $_POST['seRepite'] . "&fechaYHora=" . date("Y-m-d H:i:s") . "'>aqu&iacute;</a> una vez que lo haya hecho."*/;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}