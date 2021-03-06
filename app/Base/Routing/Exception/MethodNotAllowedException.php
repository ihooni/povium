<?php
/**
 * Exception thrown when matched pattern is found but the request method is not found.
 * This exception should trigger an HTTP 405 response.
 *
 * @author		H.Chihoon
 * @copyright	2019 Payw
 */

namespace Povium\Base\Routing\Exception;

class MethodNotAllowedException extends \RuntimeException implements ExceptionInterface
{
	/**
	 * Allowed methods for specific URI
	 *
	 * @var array
	 */
	private $allowedMethods = array();

	/**
	 * @param array 		$allowed_methods	Allowed methods for specific URI
	 * @param string		$message        	Exception message
	 * @param int			$code           	Exception code
	 * @param \Throwable	$previous       	Previous exception
	 */
	public function __construct($allowed_methods, $message = "", $code = 0, $previous = null)
	{
		$this->allowedMethods = $allowed_methods;

		parent::__construct($message, $code, $previous);
	}

	/**
	 * Gets the allowed methods
	 *
	 * @return array
	 */
	public function getAllowedMethods()
	{
		return $this->allowedMethods;
	}
}
