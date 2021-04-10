<?php
require WELLRIX_SMTP_PLUGIN_PATH.'/functions/ClassMail.php';
$mail = new WellrixMail();

$result = $mail->send_mail(array_rename($_POST['data']), $_POST['addresses'], $_POST['subject']);

print_r($result);
?>