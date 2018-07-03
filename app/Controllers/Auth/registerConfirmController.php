<?php
/**
*
* Receive register inputs and process register.
*
* @author H.Chihoon
* @copyright 2018 DesignAndDevelop
*
*/

use Povium\Base\Factory\MasterFactory;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php'
$factory = new MasterFactory();

$auth = $factory->createInstance('\Povium\Auth\Auth');

/* receive register inputs by ajax */
$register_inputs = json_decode($_POST['register_inputs'], true);
$email = $register_inputs['email'];
$name = $register_inputs['name'];
$password = $register_inputs['password'];

#	$register_return = array('err' => bool, 'msg' => 'err msg for display', 'redirect' => 'redirect url');
$register_return = array_merge($auth->register($email, $name, $password), array('redirect' => ''));

if ($register_return['err']) {			//	failed to register

} else {								//	register success
	$auth->login($email, $password, false);
	$register_return['redirect'] = '/';
}

echo json_encode($register_return);

?>