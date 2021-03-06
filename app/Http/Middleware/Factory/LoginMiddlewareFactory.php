<?php
/**
 * This factory is responsible for creating "LoginMiddleware" instance.
 *
 * @author		H.Chihoon
 * @copyright	2019 Payw
 */

namespace Povium\Http\Middleware\Factory;

use Povium\Base\Factory\MasterFactory;
use Povium\Base\Routing\Validator\RedirectURIValidator;
use Povium\Http\Controller\Authentication\LoginController;
use Povium\Security\Auth\Authenticator;

class LoginMiddlewareFactory extends AbstractAjaxMiddlewareFactory
{
    /**
     * {@inheritdoc}
     *
     * @param Authenticator
     */
    protected function prepareArgs()
    {
    	parent::prepareArgs();

        $materials = func_get_args();
		$factory = new MasterFactory();

        $authenticator = $materials[0];
		$redirect_uri_validator = $factory->createInstance(RedirectURIValidator::class);
		$login_controller = $factory->createInstance(LoginController::class, $authenticator);

		$this->args[] = $redirect_uri_validator;
		$this->args[] = $login_controller;
    }
}
