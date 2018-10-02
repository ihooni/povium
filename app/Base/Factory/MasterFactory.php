<?php
/**
* The application factory is a facade to all factories.
* It cannot create any instances itself, but knows which factory is
* responsible for creating which instance and delegates instantiation.
*
* @author		H.Chihoon
* @copyright	2018 DesignAndDevelop
*/

namespace Povium\Base\Factory;

use Povium\Base\Factory\Exception\NonexistentTypeException;
use Povium\Base\Factory\Exception\UnregisteredTypeException;

class MasterFactory implements FactoryInterface
{
	/**
	* Associative array tracking which factory is responsible for a type.
	* Array keys are type names, array values are factory names.
	*
	* @var array
	*/
	protected $typeMap;

	/**
	* Initialize type map
	*/
	public function __construct()
	{
		$this->typeMap = require($_SERVER['DOCUMENT_ROOT'] . '/../config/factory.php');
	}

	/**
	* Returns an instance of the requested type by delegating call to
	* responsible child factory instance.
	*
	* @param	string	$type
	* @param	mixed
	*
	* @return object	An instance of given type
	*
	* @throws NonexistentTypeException		If the type is not exist
	* @throws UnregisteredTypeException		If the type is not registered
	*/
	public function createInstance($type)
	{
		if (!class_exists($type)) {
			throw new NonexistentTypeException('Nonexistent type: "' . $type . '"');
		}

		if (!$this->hasFactoryFor($type)) {
			throw new UnregisteredTypeException('Unregistered type: "' . $type . '"');
		}

		$factory = $this->getFactoryFor($type);

		return (new $factory())->createInstance(...func_get_args());
	}

	/**
	* Check if responsible factory for creating instance is exist
	*
	* @param  string  $type
	*
	* @return boolean
	*/
	protected function hasFactoryFor($type)
	{
		foreach ($this->typeMap as $factory => $types) {
			if (array_search($type, $types) !== false) {
				return true;
			}
		}

		return false;
	}

	/**
	* Get responsible factory name for creating instance of given type
	*
	* @param  string $type
	*
	* @return string factory name
	*/
	protected function getFactoryFor($type)
	{
		foreach ($this->typeMap as $factory => $types) {
			if (array_search($type, $types) !== false) {
				return $factory;
			}
		}
	}
}
