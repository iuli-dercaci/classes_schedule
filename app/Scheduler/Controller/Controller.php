<?php
namespace Scheduler\Controller;

/**
 * @author Iuli Dercaci <iuli.dercaci@gmail.com>
 */
class Controller
{
    protected $data;

	protected $templatesDir;

	public $template;

	public function __construct($templatesDir=null)
	{
        $this->data = [];
		$this->templatesDir = $templatesDir ?: '../views/';
        $this->template = strtolower(basename(get_called_class())) . '.phtml';
	}

	public function setTemplate($template)
	{
		$this->template = $template;
	}

	public function render()
	{
        extract($this->data);
        include $this->getTemplatePath();
	}

    private function getTemplatePath()
    {
        $template = __DIR__ . DIRECTORY_SEPARATOR . $this->templatesDir . $this->template;
        if (is_file($template)) {
            return $template;
        }
        throw new \Exception('Given script "' . $template . '" was not found');
    }
}