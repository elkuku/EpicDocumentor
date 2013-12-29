<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 26.12.13
 * Time: 09:05
 */

namespace Epicdoc\Controller;

/**
 * Abstract controller for AJAX requests
 *
 * @since  1.0
 */
abstract class AbstractAjaxController extends AbstractEpicdocController
{
	/**
	 * AjaxResponse object.
	 *
	 * @var    AjaxResponse
	 * @since  1.0
	 */
	protected $response;

	/**
	 * Constructor.
	 *
	 * @since   1.0
	 */
	public function __construct()
	{
		parent::__construct();

		$this->response = new AjaxResponse;
	}

	/**
	 * Execute the controller.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @throws  \RuntimeException
	 */
	public function execute()
	{
		ob_start();

		try
		{
			$this->prepareResponse();
		}
		catch (\Exception $e)
		{
			$this->response->error = $e->getMessage();
		}

		$errors = ob_get_clean();

		if ($errors)
		{
			$this->response->error .= $errors;
		}

		header('Content-type: application/json');

		echo json_encode($this->response);

		exit(0);
	}

	/**
	 * Prepare the response.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	abstract protected function prepareResponse();
}

/**
 * AJAX response object
 *
 * @since  1.0
 */
class AjaxResponse
{
	/**
	 * Data object.
	 *
	 * @var    \stdClass
	 * @since  1.0
	 */
	public $data;

	/**
	 * Error message.
	 *
	 * @var    string
	 * @since  1.0
	 */
	public $error = '';

	/**
	 * Message string.
	 *
	 * @var    string
	 * @since  1.0
	 */
	public $message = '';

	/**
	 * Constructor
	 *
	 * @since  1.0
	 */
	public function __construct()
	{
		$this->data = new \stdClass;
	}
}
