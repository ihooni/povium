<?php
/**
* This factory is responsible for creating "ReadableIDValidator" instance.
*
* @author		H.Chihoon
* @copyright	2018 DesignAndDevelop
*/

namespace Povium\Security\Validator\Factory;

use Povium\Base\Factory\AbstractChildFactory;
use Povium\Base\Factory\MasterFactory;
use Povium\Security\User\UserManager;

class ReadableIDValidatorFactory extends AbstractChildFactory
{
	/**
	 * {@inheritdoc}
	 */
	protected function prepareArgs()
	{
		$factory = new MasterFactory();

		$config = require($_SERVER['DOCUMENT_ROOT'] . '/../config/readable_id_validator.php');
		$user_manager = $factory->createInstance(UserManager::class);

		$this->args[] = $config;
		$this->args[] = $user_manager;
	}
}
