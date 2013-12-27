<?php
/**
 * Part of the Joomla Tracker's Tracker Application
 *
 * @copyright  Copyright (C) 2012 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace App\Epicdoc\Controller;

use Epicdoc\Controller\AbstractEpicdocController;

/**
 * Default controller class for the Tracker component.
 *
 * @since  1.0
 */
class DefaultController extends AbstractEpicdocController
{
	/**
	 * @var DefaultHtmlView
	 */
	protected $view;

	/**
	 * @var DefaultModel
	 */
	protected $model;

	/**
	 * The default view for the app
	 *
	 * @var    string
	 * @since  1.0
	 */
	protected $defaultView = 'epicdoc';

	/**
	 * Initialize the controller.
	 *
	 * @return  $this
	 *
	 * @since   1.0
	 */
	public function XXXinitialize()
	{
		parent::initialize();

		$this->model->setProject($this->container->get('app')->getProject());
		$this->view->setProject($this->container->get('app')->getProject());
	}

	/**
	 * Execute the controller.
	 *
	 * @return  string  The rendered view.
	 *
	 * @since   1.0
	 */
	public function XXexecute()
	{
		/* @type \Epicdoc\Application $application */
		$application = $this->container->get('app');

		if ($application->getProject()->project_id)
		{
			$application->getUser()->authorize('view', $application->getProject());
		}

		return parent::execute();
	}
}
