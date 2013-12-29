<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace App\Epicdoc\Controller\Epicdoc;

use App\Epicdoc\View\Project\ProjectHtmlView;

use Epicdoc\Controller\AbstractEpicdocController;

/**
 * Default controller class for the Tracker component.
 *
 * @since  1.0
 */
class Project extends AbstractEpicdocController
{
	/**
	 * @var ProjectHtmlView
	 */
	protected $view;

	/**
	 * The default view for the app
	 *
	 * @var    string
	 * @since  1.0
	 */
	protected $defaultView = 'project';

	/**
	 * Execute the controller.
	 *
	 * @return  string  The rendered view.
	 *
	 * @since   1.0
	 */
	public function execute()
	{
		$this->view->setProject($this->container->get('app')->input->getCmd('project_alias'));

		return parent::execute();
	}
}
