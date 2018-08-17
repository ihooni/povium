<?php
/**
* Receive email address
* and send email for user's email address authentication.
*
* @author 		H.Chihoon
* @copyright 	2018 DesignAndDevelop
*/

global $factory, $router, $auth;

$mailer = $factory->createInstance('\Povium\Mailer\UserEmailAddressAuthMailer');

/* Receive input email by ajax */
// $email = json_decode(file_get_contents('php://input'), true);
$email = '1000jaman@naver.com';

#	$send_email_return = array(
#		'err' => bool,
#		'msg' => 'err msg for display'
#	);
$send_email_return = $auth->verifyEmail($email);

if ($send_email_return['err']) {	//	This email is not possible to authenticate

} else {						//	Valid email. Send email for email authentication.
	$token = $auth->uuidV4();	//	Generate authentication token

	if ($auth->requestEmailAuth($email, $token)) {
		$auth_uri =
			BASE_URI .
			$router->generateURI('email_authentication') .
			'?' . http_build_query(array('token' => $token));
		$mailer->sendEmail($email, $auth_uri);
	}
}

echo json_encode($send_email_return);
