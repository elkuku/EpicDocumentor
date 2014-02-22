<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace App\Epicdoc\Controller\Epicdoc;

use App\Epicdoc\Model\ProjectModel;

use Epicdoc\Controller\AbstractEpicdocController;

/**
 * Default controller class for the Tracker component.
 *
 * @since  1.0
 */
class Save extends AbstractEpicdocController
{
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

		$name    = $application->input->getCmd('name');
		$oldName = $application->input->getCmd('old_name');

		(new ProjectModel($this->container->get('db')))
			->save($name, $oldName);

		$application->redirect($application->get('uri.base.path'));

		return '';
	}
}
