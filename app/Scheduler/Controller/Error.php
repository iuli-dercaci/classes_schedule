<?php
namespace Scheduler\Controller;

/**
 * 
 */
class Error extends Controller
{
	function __construct($message=null, $header=null, $code=null)
	{
		parent::__construct();
		$this->data['message'] = $message ?: '????????? ??????';
		$this->data['header'] = $header ?: '';
		$this->data['code'] = $code ?: '';
	}

	public function index()
	{

	}
}