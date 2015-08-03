<?php 
namespace Hx\Document;

interface ReportInterface {
	
	public function generateFile(\Hx\Document\ContentInterface $content, $option);
}
?>