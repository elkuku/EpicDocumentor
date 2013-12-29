<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace Epicdoc\Controller;

use Joomla\Uri\Uri;

/**
 * Abstract Controller class for the Tracker Application
 *
 * @since  1.0
 */
abstract class AbstractEpicdocListController extends AbstractEpicdocController
{
	/**
	 * @var IssuesModel
	 */
	protected $model;

	/**
	 * Initialize the controller.
	 *
	 * @return  $this
	 *
	 * @since   1.0
	 */
	public function initialize()
	{
		parent::initialize();

		/* @type Application $application */
		$application = $this->container->get('app');

		$limit = $application->getUserStateFromRequest('list.limit', 'list_limit', 20, 'int');
		$page  = $this->container->get('app')->input->getInt('page');

		$value = $page ? ($page - 1) * $limit : 0;
		$limitStart = ($limit != 0 ? (floor($value / $limit) * $limit) : 0);

		$state = $this->model->getState();

		$state->set('list.start', $limitStart);
		$state->set('list.limit', $limit);

		$this->model->setState($state);

		$this->model->setPagination(new TrackerPagination(new Uri($this->container->get('app')->get('uri.request'))));

		return $this;
	}
}
