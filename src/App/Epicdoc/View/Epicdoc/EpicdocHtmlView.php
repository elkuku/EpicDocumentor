<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace App\Epicdoc\View\Epicdoc;

use Epicdoc\View\EpicdocDefaultView;

class EpicdocHtmlView extends EpicdocDefaultView
{
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
		$this->renderer->set('projects', $this->model->getItems());

		return parent::render();
	}


}
