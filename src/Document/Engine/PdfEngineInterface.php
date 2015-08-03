<?php 
namespace Hx\Document;

interface PdfEngineInterface {
	
	public function drawText($text);
	
	public function drawHorizontalLine();
	
	public function drawImage($filePath);
	
	public function drawBox();
	
	public function drawLineBeak();
	
	public function render($options);
}
?>