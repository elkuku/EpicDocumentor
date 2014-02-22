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
	protected $docuBase ='';

	public function getItems($project)
	{
		$path = $this->docuBase . '/' . $project;

		if (false == is_dir($path))
		{
			throw new \UnexpectedValueException('Invalid project.');
		}

		return Folder::files($path);
	}

	/**
	 * @return string
	 */
	public function getDocuBase()
	{
		return $this->docuBase;
	}

	/**
	 * @param string $docuBase
	 */
	public function setDocuBase($docuBase)
	{
		$this->docuBase = $docuBase;
	}
}
