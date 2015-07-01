<?php 
namespace Hx\Template;

class Template implements TemplateInterface {

	private $templateEngine;

	public function __construct(EngineInterface $templateEngine)
	{
		$this->templateEngine = $templateEngine;
	}

	public function generate(Array $data, $templateFilePath)
	{
		if (!file_exists($templateFilePath))
			throw new TemplateException("Template file not found, $templateFilePath");
		
		if (!is_readable($templateFilePath))
			throw new TemplateException("Template file not readble, $templateFilePath");
		
		$templateContext = file_get_contents($templateFilePath);
		
		return $this->templateEngine
			->transform($data, $templateContext);
	}

	public function generateFromString(Array $data, $template)
	{
		return $this->templateEngine
			->transform($data, $template);
	}
}
?>