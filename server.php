<?php

require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$data[] = !empty($_POST['name']) ? trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING)) : '';
$data[] = !empty($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) : '';
$data[] = !empty($_POST['phone']) ? trim(filter_var($_POST['phone'], FILTER_SANITIZE_STRING)) : '';
$data[] = !empty($_POST['type']) ? trim(filter_var($_POST['type'], FILTER_SANITIZE_STRING)) : '';

if (!in_array(null, $data)) {

    if (mb_strlen($data[0]) > 2 && mb_strlen($data[0]) < 50) {

        if (preg_match("/^(?:0(?!(5|7))(?:2|3|4|8|9))(?:-?\d){7}$|^(0(?=5|7)(?:-?\d){9})$/", $data[2])) {
            
    mail('sagi536@gmail.com', 'Leader', 'HI to you');
            
            $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('no-replay@domain.com', 'Mailer');
    $mail->addAddress('sagi.isaschar@gmail.com', 'Shlomi');
    $mail->Subject = 'Here is the subject';
    
$mail->Body = <<<EOT
<h3>New lead from site - </h3>
<b>Client name: </b>demo name<br>
<b>Client email: </b>demo emaili<br>
<b>Client phone: </b>demo phone<br>
EOT;

    $mail->IֿsHTML(true); 
	$mail->send();


            $dbcon = 'mysql:host=localhost;dbname=omriTakin;charset=utf8';
            $db = new PDO($dbcon, 'omritakin', '0192sagi');
            $sql = "INSERT INTO contact VALUES(null,?,?,?,?,NOW())";
            $query = $db->prepare($sql);
            $res = $query->execute($data);

            if ($res){
                echo true;
            }
        }
    }
}


