<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace App\Epicdoc\View\Project;

use Epicdoc\View\EpicdocDefaultView;

class ProjectHtmlView extends EpicdocDefaultView
{
	protected $project;
	protected $page;

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
			// New project
			return '';
		}

		return $this->project;
	}

	/**
	 * @param mixed $page
	 */
	public function setPage($page)
	{
		$this->page = $page;
	}

	/**
	 * @return mixed
	 */
	public function getPage()
	{
		return $this->page;
	}
}
