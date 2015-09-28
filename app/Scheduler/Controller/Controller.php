<?php
namespace Scheduler\Controller;

/**
 * @author Iuli Dercaci <iuli.dercaci@gmail.com>
 */
class Controller
{
	protected $templateDir = '../views/';

	protected $template;

	public function setTemplate($template)
	{
		$this->template = $template;
	}
}