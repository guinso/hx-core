<?php 
namespace Hx\Document\Style;

interface PaperInterface {
	
	const SIZE_LETTER = 'letter';
	const SIZE_A3 = 'A3';
	const SIZE_A4 = 'A4';
	const SIZE_B1 = 'B1';
	const SIZE_B2 = 'B1';
	
	const OREINTATION_POTRAIT = 'potrait';
	const OREINTATION_LANDSCAPE = 'landscape';
	
	const UNIT_MM = 'mm';
	const UNIT_INCH = 'inch';
	
	public function getPaperSize();
	
	public function setPaperSize($paperSize);
	
	public function getPaperOreintation();

	public function setPaperOreintation($oreintation);
	
	public function getUnitOfMeasure();
	
	public function setUnitOfMeasure($uom);
	
	public function reset();
}
?>