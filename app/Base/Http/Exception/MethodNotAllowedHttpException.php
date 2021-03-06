<?php
/**
 * Http exception for 405 Method Not Allowed.
 *
 * @author		H.Chihoon
 * @copyright	2019 Payw
 */

namespace Povium\Base\Http\Exception;

class MethodNotAllowedHttpException extends HttpException
{
	/**
	 * {@inheritdoc}
	 */
	public function __construct($message = "", $code = 0, $previous = null)
	{
		parent::__construct(405, $message, $code, $previous);
	}
}
