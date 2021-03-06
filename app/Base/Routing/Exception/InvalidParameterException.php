<?php
/**
 * Exception thrown when a parameter is not valid.
 *
 * @author		H.Chihoon
 * @copyright	2019 Payw
 */

namespace Povium\Base\Routing\Exception;

class InvalidParameterException extends \InvalidArgumentException implements ExceptionInterface
{
}
