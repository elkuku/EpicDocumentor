<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace Epicdoc\Service;

use Joomla\Database\DatabaseDriver;
use Joomla\DI\Container as JoomlaContainer;
use Joomla\DI\ServiceProviderInterface;

/**
 * Database service provider
 *
 * @since  1.0
 */
class DatabaseProvider implements ServiceProviderInterface
{
	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   JoomlaContainer  $container  The DI container.
	 *
	 * @return  Container  Returns itself to support chaining.
	 *
	 * @since   1.0
	 */
	public function register(JoomlaContainer $container)
	{
		$container->set('Joomla\\Database\\DatabaseDriver',
			function () use ($container)
			{
				$app = $container->get('app');

				$options = array(
					'driver' => $app->get('database.driver'),
					'host' => $app->get('database.host'),
					'user' => $app->get('database.user'),
					'password' => $app->get('database.password'),
					'database' => $app->get('database.name'),
					'prefix' => $app->get('database.prefix')
				);

				$db = DatabaseDriver::getInstance($options);
				$db->setDebug($app->get('debug.database', false));

				return $db;
			}, true, true
		);

		// Alias the database
		$container->alias('db', 'Joomla\\Database\\DatabaseDriver');
	}
}
