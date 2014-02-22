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
	protected $docuBase ='';

	public function getItems()
	{
		return (new ProjectModel($this->db, $this->getDocuBase()))->getProjects();
	}

	/**
	 * @return string
	 */
	public function getDocuBase()
	{
		if (!$this->docuBase)
		{
			throw new \UnexpectedValueException('Docu base not set.');
		}

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
