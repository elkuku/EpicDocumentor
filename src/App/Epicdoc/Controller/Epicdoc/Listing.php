<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace App\Epicdoc\Controller\Epicdoc;

use App\Epicdoc\Model\EpicdocModel;
use App\Epicdoc\View\Epicdocs\EpicdocsHtmlView;
use Epicdoc\Controller\AbstractEpicdocController;

/**
 * Default controller class for the Tracker component.
 *
 * @since  1.0
 */
class Listing extends AbstractEpicdocController
{
	/**
	 * @var EpicdocsHtmlView
	 */
	protected $view;

	/**
	 * @var EpicdocModel
	 */
	protected $model;

	/**
	 * The default view for the app
	 *
	 * @var    string
	 * @since  1.0
	 */
	protected $defaultView = 'epicdocs';

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

		$this->model->setDocuBase($this->container->get('config')->get('docu_base'));

		$project = $application->input->getCmd('project_alias');

		$this->view->setProject($project);

		if (0)//$application->getProject()->project_id)
		{
			//$application->getUser()->authorize('view', $application->getProject());
		}

		return parent::execute();
	}
}
