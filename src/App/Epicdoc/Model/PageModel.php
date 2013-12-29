<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace App\Epicdoc\Model;

use Epicdoc\Model\AbstractEpicdocDatabaseModel;
use Joomla\Filesystem\File;

/**
 * Default model class for the Tracker component.
 *
 * @since  1.0
 */
class PageModel extends AbstractEpicdocDatabaseModel
{
	public function getItem($project, $page)
	{
		$path = JPATH_ROOT . '/docu_base' . '/' . $project . '/' . $page;

		if (false == file_exists($path))
		{
			throw new \UnexpectedValueException('Page not found.', 404);
		}

		return file_get_contents($path);
	}

	public function save($project, $page, $oldPage, $text)
	{
		$basePath = with(new ProjectModel($this->db))->getBasePath();

		$path = $basePath . '/' . $project . '/' . $page;

		if ($oldPage && $page != $oldPage)
		{
			$oldPath = $basePath . '/' . $project . '/' . $oldPage;

			if (false == file_exists($oldPath))
			{
				throw new \UnexpectedValueException('No such page.');
			}


			if (false == rename($oldPath, $path))
			{
				throw new \DomainException('Can not rename the page.');
			}
		}


		if (false == File::write($path, $text))
		{
			throw new \DomainException('Can not write the page.');
		}
	}
}
