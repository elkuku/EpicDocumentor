<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace App\Epicdoc\View\Epicdocs;

use Epicdoc\View\EpicdocDefaultView;

class EpicdocsHtmlView extends EpicdocDefaultView
{
	protected $project;

	/**
	 * @var  \App\Epicdoc\Model\EpicdocsModel
	 */
	protected $model;

	/**
	 * Method to render the view.
	 *
	 * @return  string  The rendered view.
	 *
	 * @since   1.0
	 * @throws  \RuntimeException
	 */
	public function render()
	{
		$this->renderer->set('project', $this->getProject());
		$this->renderer->set('pages', $this->model->getItems($this->getProject()));

		return parent::render();
	}

	public function setProject($project)
	{
		$this->project = $project;

		return $this;
	}

	/**
	 * @throws \RuntimeException
	 * @return mixed
	 */
	public function getProject()
	{
		if (!$this->project)
		{
			throw new \RuntimeException('Project not set!');
		}

		return $this->project;
	}
}
