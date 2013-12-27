<?php
/**
 * Part of the Joomla Tracker View Package
 *
 * @copyright  Copyright (C) 2012 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Epicdoc\View;

use Epicdoc\Application;
use Epicdoc\View\Renderer\Php;
use Joomla\Model\ModelInterface;
use Joomla\View\Renderer\RendererInterface;

use Epicdoc\Model\EpicdocDefaultModel;

/**
 * Default view class for the Tracker application
 *
 * @since  1.0
 */
class EpicdocDefaultView  extends AbstractEpicdocHtmlView
{
	/**
	 * Method to instantiate the view.
	 *
	 * @param   ModelInterface     $model           The model object.
	 * @param   RendererInterface  $renderer        The renderer interface.
	 * @param   string|array       $templatesPaths  The templates paths.
	 *
	 * @since   1.0
	 */
	public function __construct(ModelInterface $model = null, RendererInterface $renderer = null, $templatesPaths = '')
	{
		$model = $model ? : new EpicdocDefaultModel;

		if (is_null($renderer))
		{
			$renderer = new Php;
			/*
			$renderer = new Twig(
				array(
					'templates_base_dir' => JPATH_TEMPLATES,
					'environment' => array('debug' => true)
				)
			);
			*/
		}

		parent::__construct($model, $renderer, $templatesPaths);
	}
}
