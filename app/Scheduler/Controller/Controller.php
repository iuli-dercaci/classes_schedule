<?php
namespace Scheduler\Controller;

/**
 * @author Iuli Dercaci <iuli.dercaci@gmail.com>
 */
abstract class Controller
{
	protected $templateDir = '../views/';

	protected $template;

	public function setTemplate($template)
	{
		$this->template = $template;
	}
}