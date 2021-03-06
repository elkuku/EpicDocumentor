<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace App\Epicdoc\Model;

use Epicdoc\Model\AbstractEpicdocDatabaseModel;

use Joomla\Database\DatabaseDriver;
use Joomla\Filesystem\Folder;
use Joomla\Filesystem\Path;

/**
 * Default model class for the Tracker component.
 *
 * @since  1.0
 */
class ProjectModel extends AbstractEpicdocDatabaseModel
{
	protected $basePath = '';

	/**
	 * Instantiate the model.
	 *
	 * @param   DatabaseDriver  $database The database adapter.
	 * @param   string          $docuBase  Base path to docu files.
	 *
	 * @throws \UnexpectedValueException
	 * @since   1.0
	 */
	public function __construct(DatabaseDriver $database, $docuBase)
	{
		if (false == is_dir($docuBase))
		{
			throw new \UnexpectedValueException('Invalid docu base (please create): ' . $this->basePath);
		}

		$this->basePath = $docuBase;

		return parent::__construct($database);
	}

	public function save($name, $oldName)
	{
		if ($name == $oldName)
		{
			return $this;
		}

		$path = Path::clean($this->basePath . '/' . $name);

		if (is_dir($path))
		{
			throw new \DomainException('The project already exist');
		}

		if ($oldName)
		{
			$oldPath = $this->basePath . '/' . $oldName;

			if (false == is_dir($oldPath))
			{
				throw new \UnexpectedValueException('No such project.');
			}


			if (false == rename($oldPath, $path))
			{
				throw new \DomainException('Can not rename the project');
			}

			return $this;
		}

		if (false == mkdir($path))
		{
			throw new \DomainException('Can not create the project');
		}

		return $this;
	}

	public function getProjects()
	{
		return Folder::folders($this->basePath);
	}

	/**
	 * @return string
	 */
	public function getBasePath()
	{
		return $this->basePath;
	}
}
