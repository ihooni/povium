<?php
/**
 * Abstract form for controller for view page.
 *
 * @author		H.Chihoon
 * @copyright	2018 DesignAndDevelop
 */

namespace Povium\Http\Controller;

abstract class AbstractViewController
{
	/**
	 * @var array
	 */
	protected $viewConfig = array();

	/**
	 * Load config for specific view page.
	 *
	 * @return array
	 */
	abstract public function loadViewConfig();
}
