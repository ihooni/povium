<?php
/**
 * Validate attaching image in post.
 *
 * @author		H.Chihoon
 * @copyright	2019 Payw
 */

namespace Povium\Publication\Validator\PostInfo;

use Povium\Validator\ValidatorInterface;

class ImageValidator implements ValidatorInterface
{
	/**
	 * @var array
	 */
	private $config;

	/**
	 * @param array $config
	 */
	public function __construct(array $config)
	{
		$this->config = $config;
	}

	/**
	 * {@inheritdoc}
	 *
	 * @param string $image	Image file path
	 *
	 * @return array	Error flag and message
	 */
	public function validate($image)
	{
		// TODO: Implement validate() method.
	}
}
