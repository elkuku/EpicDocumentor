<?php
/**
 * Part of the Joomla Tracker's Tracker Application
 *
 * @copyright  Copyright (C) 2012 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace App\Epicdoc\Model;

use Epicdoc\Model\AbstractEpicdocDatabaseModel;
use Joomla\Filesystem\Folder;

/**
 * Default model class for the Tracker component.
 *
 * @since  1.0
 */
class EpicdocModel extends AbstractEpicdocDatabaseModel
{
	public function getItems()
	{
		return Folder::folders(JPATH_ROOT . '/docu_base');
	}
}
