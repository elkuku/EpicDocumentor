<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace Epicdoc\Router\Exception;

/**
 * RoutingException
 *
 * @since  1.0
 */
class RoutingException extends \Exception
{
	/**
	 * The raw route.
	 *
	 * @var    string
	 * @since  1.0
	 */
	protected $rawRoute = '';

	/**
	 * Constructor.
	 *
	 * @param   string  $rawRoute  The raw route.
	 *
	 * @since   1.0
	 */
	public function __construct($rawRoute)
	{
		$this->rawRoute = $rawRoute;

		parent::__construct('Bad Route', 404);
	}

	/**
	 * Get the raw route.
	 *
	 * @return  string
	 *
	 * @since   1.0
	 */
	public function getRawRoute()
	{
		return $this->rawRoute;
	}
}
