<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace App\Epicdoc\Model;

use Epicdoc\Model\AbstractEpicdocDatabaseModel;

use Joomla\Filesystem\Folder;

/**
 * Default model class for the Tracker component.
 *
 * @since  1.0
 */
class EpicdocsModel extends AbstractEpicdocDatabaseModel
{
	public function getItems($project)
	{
		$path = JPATH_ROOT . '/docu_base/' . $project;

		if (false == is_dir($path))
		{
			throw new \UnexpectedValueException('Invalid project.');
		}

		return Folder::files($path);
	}
}
