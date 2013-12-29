<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace App\Epicdoc\Model;

use Epicdoc\Model\AbstractEpicdocDatabaseModel;

/**
 * Default model class for the Tracker component.
 *
 * @since  1.0
 */
class EpicdocModel extends AbstractEpicdocDatabaseModel
{
	public function getItems()
	{
		return with(new ProjectModel($this->db))->getProjects();
	}
}
