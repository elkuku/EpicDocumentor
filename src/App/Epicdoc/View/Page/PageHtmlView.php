<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace App\Epicdoc\View\Page;

use Epicdoc\View\EpicdocDefaultView;

class PageHtmlView extends EpicdocDefaultView
{
	protected $project;

	protected $page;

	/**
	 * @var  \App\Epicdoc\Model\PageModel
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
		$this->renderer->set('page', $this->getPage());
		$this->renderer->set('item', $this->model->getItem($this->getProject(), $this->getPage()));

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
		if (!$this->page)
		{
			// New page
			return '';
		}
		return $this->page;
	}
}
