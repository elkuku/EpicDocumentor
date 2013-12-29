<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace Epicdoc\Service;

use Joomla\DI\Container as JoomlaContainer;
use Joomla\DI\ServiceProviderInterface;

/**
 * Debug service provider
 *
 * @since  1.0
 */
class DebuggerProvider implements ServiceProviderInterface
{
	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   \Joomla\DI\Container  $container  The DI container.
	 *
	 * @return  Container  Returns itself to support chaining.
	 *
	 * @since   1.0
	 * @throws  \RuntimeException
	 */
	public function register(JoomlaContainer $container)
	{
		$container->set('App\\Debug\\TrackerDebugger',
			function () use ($container)
			{
				return new TrackerDebugger($container->get('app'));
			}, true, true
		);

		// Alias the object
		$container->alias('debugger', 'App\\Debug\\TrackerDebugger');
	}
}
