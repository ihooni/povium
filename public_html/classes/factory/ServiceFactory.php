<?php
/**
*
* This Factory is responsible for creating instance of type based on service.
*
* @author fairyhooni
* @license MIT
*
*/


namespace povium\factory;


class ServiceFactory extends AbstractChildFactory {

	/**
	* Manufacture materials into arguments
	*
	* @param mixed materials
	* @return void
	*/
	protected function prepareArgs () {
		$args = func_get_args();
		$db_conn = \povium\conn\DBConnection::getInstance()->getConn();

		array_unshift($args, $db_conn);

		$this->args = $args;
	}

}



?>
