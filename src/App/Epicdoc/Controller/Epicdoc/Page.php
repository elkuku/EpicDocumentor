<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace App\Epicdoc\Controller\Epicdoc;

use Epicdoc\Controller\AbstractEpicdocController;

/**
 * Default controller class for the Tracker component.
 *
 * @since  1.0
 */
class Page extends AbstractEpicdocController
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
	protected $defaultView = 'page';

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
	public function execute()
	{
		/* @type \Epicdoc\Application $application */
		$application = $this->container->get('app');

		$project = $application->input->getCmd('project_alias');
		$page = $application->input->getCmd('page_alias');

		$this->view->setProject($project);
		$this->view->setPage($page);

		if (0)//$application->getProject()->project_id)
		{
			//$application->getUser()->authorize('view', $application->getProject());
		}

		return parent::execute();
	}
}
