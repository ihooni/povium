<?php
/**
* This factory is responsible for creating "SessionManager" instance.
*
* @author		H.Chihoon
* @copyright	2018 DesignAndDevelop
*/

namespace Povium\Base\Http\Factory;

use Povium\Base\Factory\AbstractChildFactory;
use Povium\Base\Factory\MasterFactory;
use Povium\Base\DBConnection;

class SessionManagerFactory extends AbstractChildFactory
{
	/**
	 * {@inheritdoc}
	 */
	protected function prepareArgs()
	{
		$master_factory = new MasterFactory();

		$config = require($_SERVER['DOCUMENT_ROOT'] . '/../config/session.php');
		$conn = DBConnection::getInstance()->getConn();
		$session_handler = $master_factory->createInstance('\Povium\Base\Http\Session\PDOSessionHandler');

		$this->args = array(
			$config,
			$conn,
			$session_handler
		);
	}
}