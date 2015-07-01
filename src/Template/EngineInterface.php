<?php 
namespace Hx\Template;

interface EngineInterface {
	
	/**
	 * Transform content
	 * @param 	array 	$data		data of reference, value must primitive type only
	 * @param 	string 	$template	template content, in text
	 * @return 	string	content with associate with injected data
	 */
	public function transform(Array $data, $template);
}
?>