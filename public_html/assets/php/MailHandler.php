<?php

/**
 * Class to handle all mailing
 */
class MailHandler {

    private $mail;

    function __construct() {
        require_once 'EmailTemplates.php';
        require_once 'Config.php';
        require_once 'phpmailer/PHPMailerAutoload.php';
        $this->mail = new PHPMailer;
        $this->mail = new PHPMailer;
        $this->mail->isSMTP();                                  // Set mailer to use SMTP
        $this->mail->Host = MAIL_SERVER;                        // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                           // Enable SMTP authentication
        $this->mail->Username = MAIL_USER;                      // SMTP username
        $this->mail->Password = MAIL_PASSWORD;                  // SMTP password
        $this->mail->SMTPSecure = MAIL_SECURITY;                // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = MAIL_PORT;                          // SMTP Port
        $this->mail->From = MAIL_FROM;                          // Mail from, comming from template
        $this->mail->FromName = MAIL_FROM_NAME;                 // Mail From name, comming from templates
        $this->mail->addReplyTo(MAIL_FROM, MAIL_FROM_NAME);     // Reply to
        //$this->mail->addCC('adrimejicuar@gmail.com');                       // Add CC
        //$mail->addBCC('bcc@example.com');                     // Add BCC
        $this->mail->WordWrap = 50;                             // Set word wrap to 50 characters
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $this->mail->isHTML(true);                              // Set email format to HTML
		//$this->mail->SMTPDebug  = 2;
    }

    /**
     * Send a password change request email with Template
     * @param String $to Email to send message
     * @param String $hash_code Hash code containing the reset pw
     * @return Object with information from mail sender.
     */
        public function send_email_msg($to, $from, $fn, $ln,  $msg, $subs) {

        $this->mail->addAddress($to); // Add a recipient
        $this->mail->addAddress('adrimejicuar@gmail.com', 'Adriana Mejia'); // Add a recipient
        $this->mail->addAddress('macamecu@gmail.com', 'Carolina Mejia'); // Add a recipient
        $this->mail->Subject = MSG_SUBJECT;
        $str_temp         = strtr(MSG_BODY, array('{{msg_name}}' => $fn));
        $str_temp2         = strtr($str_temp, array('{{msg_last}}' => $ln));
        $str_temp3         = strtr($str_temp2, array('{{msg_from}}' => $from));
		$str_temp4        = strtr($str_temp3, array('{{msg_subs}}' => $subs));
        $this->mail->Body = strtr($str_temp4, array('{{msg_body}}' => $msg));
        ;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $resp = $this->mail->send();
        return $resp;
    }

}
?>

