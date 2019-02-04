<?php
/**
 * This factory is responsible for creating "AuthServiceProvider" instance.
 *
 * @author		H.Chihoon
 * @copyright	2019 Payw
 */

namespace Povium\Provider\Factory;

use Povium\Base\Factory\AbstractChildFactory;
use Povium\Base\Factory\MasterFactory;

class AuthServiceProviderFactory extends AbstractChildFactory
{
	/**
	 * {@inheritdoc}
	 */
	protected function prepareArgs()
	{
		$factory = new MasterFactory();

		$this->args[] = $factory;
	}
}
