<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace App\Epicdoc\Controller\Epicdoc\Page;

use App\Epicdoc\Model\PageModel;

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
	 * @throws \UnexpectedValueException
	 * @return  string  The rendered view.
	 *
	 * @since   1.0
	 */
	public function execute()
	{
		/* @type \Epicdoc\Application $application */
		$application = $this->container->get('app');

		$project = $application->input->getCmd('project');
		$page    = $application->input->getCmd('page');
		$oldPage = $application->input->getCmd('old_page');
		$text    = $application->input->get('text', '', 'raw');

		if (!$project)
		{
			throw new \UnexpectedValueException('No project given');
		}

		if (!$page)
		{
			throw new \UnexpectedValueException('No page title given');
		}

		if (!$text)
		{
			throw new \UnexpectedValueException('No text given');
		}

		with(new PageModel($this->container->get('db')))
			->save($project, $page, $oldPage, $text);

		$application->redirect($application->get('uri.base.path') . 'epicdoc/' . $project);

		return '';
	}
}
