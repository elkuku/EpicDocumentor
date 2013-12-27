<?php
/**
 * Part of the Joomla Tracker
 *
 * @copyright  Copyright (C) 2012 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Epicdoc;

use Joomla\Application\AbstractWebApplication;
use Joomla\DI\Container;

use Epicdoc\Controller\AbstractEpicdocController;
use Epicdoc\Router\EpicdocRouter;

use Epicdoc\Service\ApplicationProvider;
use Epicdoc\Service\ConfigurationProvider;
use Epicdoc\Service\DatabaseProvider;
use Epicdoc\Service\GitHubProvider;

/**
 * Joomla Tracker web application class
 *
 * @since  1.0
 */
final class Application extends AbstractWebApplication
{
	/**
	 * The name of the application.
	 *
	 * @var    array
	 * @since  1.0
	 */
	protected $name = null;

	/**
	 * @var    Container
	 * @since  1.0
	 */
	private $container = null;

	/**
	 * Class constructor.
	 *
	 * @since   1.0
	 */
	public function __construct()
	{
		// Run the parent constructor
		parent::__construct();

		// Build the DI Container
		$this->container = with(new Container)
			->registerServiceProvider(new ApplicationProvider($this))
			->registerServiceProvider(new ConfigurationProvider($this->config))
			->registerServiceProvider(new DatabaseProvider)
			//->registerServiceProvider(new DebuggerProvider)
			->registerServiceProvider(new GitHubProvider);

		$this
			//->loadLanguage()
			->mark('Application started');
	}

	/**
	 * Get a debugger object.
	 *
	 * @return  TrackerDebugger
	 *
	 * @since   1.0
	 */
	public function getDebugger()
	{
		return $this->container->get('debugger');
	}

	/**
	 * Method to run the Web application routines.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function doExecute()
	{
		try
		{
			// Instantiate the router
			$router = new EpicdocRouter($this->container, $this->input);
			$maps = json_decode(file_get_contents(JPATH_ROOT . '/etc/routes.json'));

			if (!$maps)
			{
				throw new \RuntimeException('Invalid router file.', 500);
			}

			$router->addMaps($maps, true);
			$router->setControllerPrefix('\\App');
			$router->setDefaultController('\\Epicdoc\\Controller\\DefaultController');

			// Fetch the controller
			/* @type AbstractEpicdocController $controller */
			$controller = $router->getController($this->get('uri.route'));

			$this->mark('Controller->initialize()');

			$controller->initialize();

			// Execute the App

			// Define the app path
			define('JPATH_APP', JPATH_ROOT . '/src/App/' . ucfirst($controller->getApp()));

			// Load the App language file
			//g11n::loadLanguage($controller->getApp(), 'App');

			$this->mark('Controller->execute()');

			$contents = $controller->execute();

			$this->mark('Application terminated OK');

			//$contents = str_replace('%%%DEBUG%%%', $this->getDebugger()->getOutput(), $contents);

			$this->setBody($contents);
		}
		catch (AuthenticationException $exception)
		{
			header('HTTP/1.1 403 Forbidden', true, 403);

			$this->mark('Application terminated with an AUTH EXCEPTION');

			$context = array();
			$context['message'] = 'Authentication failure';

			if (JDEBUG)
			{
				// The exceptions contains the User object and the action.
				if ($exception->getUser()->username)
				{
					$context['user'] = $exception->getUser()->username;
					$context['id'] = $exception->getUser()->id;
				}

				$context['action'] = $exception->getAction();
			}

			$this->setBody($this->getDebugger()->renderException($exception, $context));
		}
		catch (RoutingException $exception)
		{
			header('HTTP/1.1 404 Not Found', true, 404);

			$this->mark('Application terminated with a ROUTING EXCEPTION');

			$context = JDEBUG ? array('message' => $exception->getRawRoute()) : array();

			$this->setBody($this->renderException($exception, $context));
		}
		catch (\Exception $exception)
		{
			header('HTTP/1.1 500 Internal Server Error', true, 500);

			$this->mark('Application terminated with an EXCEPTION');

			$this->setBody($this->renderException($exception));
		}
	}

	/**
	 * Add a profiler mark.
	 *
	 * @param   string  $text  The message for the mark.
	 *
	 * @return  $this  Method allows chaining
	 *
	 * @since   1.0
	 */
	public function mark($text)
	{
		if ($this->get('debug.system'))
		{
			//$this->getDebugger()->mark($text);
		}

		return $this;
	}

	/**
	 * Method to render an exception in a user friendly format
	 *
	 * @param   \Exception  $exception  The caught exception.
	 * @param   array       $context    The message to display.
	 *
	 * @return  string  The exception output in rendered format.
	 *
	 * @since   1.0
	 */
	public function renderException(\Exception $exception, array $context = array())
	{
		static $loaded = false;

		if ($loaded)
		{
			// Seems that we're recursing...
			$this->getLogger()->error($exception->getCode() . ' ' . $exception->getMessage(), $context);

			return str_replace(JPATH_ROOT, 'JROOT', $exception->getMessage())
			. '<pre>' . $exception->getTraceAsString() . '</pre>'
			. 'Previous: ' . get_class($exception->getPrevious());
		}

		$view = new \Epicdoc\View\EpicdocDefaultView;

		$message = '';

		foreach ($context as $key => $value)
		{
			$message .= $key . ': ' . $value . "\n";
		}

		$view->setLayout('exception')
			->getRenderer()
			->set('exception', $exception)
			->set('message', str_replace(JPATH_ROOT, 'ROOT', $message))
			->set('uri', $this->get('uri'))
			->set('debugMedia', 0);

		$loaded = true;

		$contents = $view->render();

		$debug = '';//JDEBUG ? $this->getOutput() : '';

		$contents = str_replace('%%%DEBUG%%%', $debug, $contents);

		$this->getLogger()->error($exception->getCode() . ' ' . $exception->getMessage(), $context);

		return $contents;
	}
}
