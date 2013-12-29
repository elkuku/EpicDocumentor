<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace Epicdoc\Service;

use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

use Epicdoc\Application;

/**
 * Application service provider
 *
 * @since  1.0
 */
class ApplicationProvider implements ServiceProviderInterface
{
	/**
	 * Application instance
	 *
	 * @var    Application
	 * @since  1.0
	 */
	private $app;

	/**
	 * Constructor
	 *
	 * @param   Application  $app  Application instance
	 *
	 * @since   1.0
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container  $container  The DI container.
	 *
	 * @return  Container  Returns itself to support chaining.
	 *
	 * @since   1.0
	 * @throws  \RuntimeException
	 */
	public function register(Container $container)
	{
		$app = $this->app;

		$container->set('Epicdoc\\Application',
			function () use ($app)
			{
				return $app;
			}, true, true
		);

		// Alias the application
		$container->alias('app', 'Epicdoc\\Application');
	}
}
