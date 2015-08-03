<?php 
namespace Hx\Document\Component;

interface DocInterface extends \Hx\Document\Component\ElementInterface {
	
	const PAGE_A1 = 'A1';
	const PAGE_A2 = 'A2';
	const PAGE_A3 = 'A3';
	const PAGE_A4 = 'A4';
	const PAGE_A5 = 'A5';
	
	const ORENTATION_POTRAIT = 'potrait';
	const ORENTATION_LANSCAPE = 'landscape';
	
	const UNIT_MM = 'mm';
	const UNIT_INCH = 'inch';
	
	public function getOrentation();
	
	public function getPageSize();
	
	public function getMargin();
	
	public function getUnit();
	
	public function getEncoding();
	
	
	public function getTitle();
	
	public function getAuthor();
	
	public function getSubject();
	
	public function getKeyword();
	
	public function isAutoBreak();
}
?>