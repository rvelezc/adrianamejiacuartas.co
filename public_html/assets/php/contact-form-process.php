<?php
session_start();

/*
Credits: Bit Repository
URL: http://www.bitrepository.com/
*/

require_once 'MailHandler.php';

/* Setup your email address to receive emails */
define( 'WEBMASTER_EMAIL', 'rafael.velez.c@gmail.com' );
define( 'EMAIL_SUBJECT', 'Mensaje:' );


function registrar_email_en_mailchimp($email, $name, $last)
{
    require_once 'mailchimp/Mailchimp.php';
    $merge_vars = array('FNAME'=>$name, 'LNAME'=>$last);
    $MailChimp = new Mailchimp('');
    $result = $MailChimp->call('lists/subscribe', array(
            'id'                => 'dfc977dc5f',
            'email'             => array('email'=>$email),
            'merge_vars'        => $merge_vars,
            'double_optin'      => false,
            'update_existing'   => true,
            'replace_interests' => false,
            'send_welcome'      => false,
        ));
    //print_r($result);
    
}



/* Do not edit below this line */

function validate_email( $e ) {
	global $email;
    global $suscribirme;
    
    $regex = '/([a-z0-9_.-]+)'. # (Name) Letters, Numbers, Dots, Hyphens and Underscores

	'@'. # (@ -at- sign)

	'([a-z0-9.-]+){2,255}'. # Domain) (with possible subdomain(s) ).

	'.'. # (. -period- sign)

	'([a-z]+){2,10}/i'; # (Extension) Letters only (up to 10 (can be increased in the future) characters)

	if($e == '') { 
		return false;
	}
	else if($e == 'Correo Electrónico (Opcional)') { 
		$email = 'Anonimo';
        $suscribirme = "No";
        return true;
	}
	else {
		$eregi = preg_replace( $regex, '', $e );
	}

	return empty( $eregi ) ? true : false;
}

error_reporting ( E_ALL ^ E_NOTICE );

$post = ( !empty( $_POST ) ) ? true : false;

if( $post )
{

	$firstname = stripslashes( strip_tags( $_POST['name'] ) );
    $lastname = stripslashes( strip_tags( $_POST['last'] ) );
	$email = trim( $_POST['email'] );
	$subject = EMAIL_SUBJECT;
	$message = stripslashes( strip_tags( $_POST['message'] ) );
	$captcha = strtoupper( trim( stripslashes( strip_tags( $_POST['g-recaptcha-response'] ) ) ) );
    $suscribirme = "No";
    if( isset($_POST['suscribir']) )
        $suscribirme = $_POST['suscribir'];
    

	$error = '';

	// Check name

	if( !$firstname )
	{
		$error .= 'Por favor ingrese su nombre.<br />';
	}
    
    if( !$lastname )
	{
		$error .= 'Por favor ingrese su apellido.<br />';
	}

	// Check email

	if( !$email )
	{
		$error .= 'Por favor ingrese su correo electrónico.<br />';
	}

	if( $email && !validate_email( $email ) )
	{
		$error .= 'Por favor ingrese un correo electrónico válido.<br />';
	}

	// Check agains bot habit

	//if ( $firstname.$lastname && $email && $firstname == $email ) {
	//	$error .= 'Nombre e email no pueden ser iguales.<br />';
	//}
	
	// Check subject

	if( !$subject )
	{
		$error .= 'Por favor proporcione un título.<br />';
	}

	// Check message (length)

	if( !$message || strlen( $message ) < 3 )
	{
		$error .= "Por favor ingrese un mensaje, el mensaje debe contener al menos 3 caracteres.<br />";
	}

    // Check captcha
    if( strlen( $captcha ) == 0 )
    {
        $error .= " Su validacion contra robots no es valida.<br />";
    }

    // Check timer
    if( isset( $_SESSION['secure']['time'] ) && time()-$_SESSION['nonce']['time'] < 30 ) {
        $error .= "Esta muy rapido, no parece humano!<br />";
    }

	if( !$error )
	{
		
		$em = new MailHandler();
		$mail = $em->send_email_msg(WEBMASTER_EMAIL, $email, $firstname, $lastname, $message, $suscribirme);
		//$mail = mail( WEBMASTER_EMAIL, $subject, $message,
		// "From: ". $name ." <".$email.">\r\n"
		//."Reply-To: ".$email."\r\n"
		//."X-Mailer: PHP/" . phpversion() );
		if( $mail ) { 
            if ($suscribirme == "Si"){
                registrar_email_en_mailchimp($email, $firstname, $lastname);
            }
            echo 'OK'; 
        }
		else {echo $mail;}

	}
	else { echo $error; }
}
?>
