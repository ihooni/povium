<?php
/**
 * Abstract form for factory which is responsible for creating standard view controller instance.
 *
 * @author		H.Chihoon
 * @copyright	2018 DesignAndDevelop
 */

namespace Povium\Http\Controller\Factory;

use Povium\Base\Factory\AbstractChildFactory;
use Povium\Base\Factory\MasterFactory;
use Povium\Loader\GlobalModule\GlobalNavigationLoader;

class StandardViewControllerFactory extends AbstractChildFactory
{
	/**
	 * {@inheritdoc}
	 */
	protected function prepareArgs()
	{
		$factory = new MasterFactory();

		$global_navigation_loader = $factory->createInstance(GlobalNavigationLoader::class);

		$this->args[] = $global_navigation_loader;
	}
}
