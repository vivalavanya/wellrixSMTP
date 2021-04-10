<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require WELLRIX_SMTP_PLUGIN_PATH . 'vendor/autoload.php';

class WellrixMail {
    function send_mail($data, $adresses = null, $subject, $formtitle = null){
        if(!$subject){
            $subject  = 'Заявка с сайта';
        }
        if(!$formtitle){
            $formtitle = WELLRIX_SMTP_SITE_URL;
        }
        
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';

        // Настройки SMTP
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = 0;
        $mail->Host = get_option( 'wellrix_smt_host' );
        $mail->Port = get_option( 'wellrix_smt_port' );
        $mail->Username = get_option( 'wellrix_smt_username' );
        $mail->Password = get_option( 'wellrix_smt_password' );

        // От кого
        $mail->setFrom(get_option( 'wellrix_smt_username' ), $formtitle);    
        
        // Проверяем есть ли адреса, куда отправлять письмо?
        if($adresses){
            foreach($adresses as $adress){
                $mail->addAddress($adress);
            }
        } else {
            // Если нету адресов вообще, то отправляем администратору
            $mail->addAddress(get_option( 'wellrix_smt_admin_email' ));
        }
        
        // Тема письма
        $mail->Subject = $subject;

        // Тело письма
        foreach($data as $key => $value) {
            $body .= $key . ": " . $value . "<br/>";
        }
        
        $mail->msgHTML($body);
        //Отправка сообщения
        if(!$mail->send()) {
            return $mail->ErrorInfo;
        } else {
            return 'ok';
        }
        exit();
    }
}
?>