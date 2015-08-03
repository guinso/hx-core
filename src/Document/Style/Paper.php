<?php 
namespace Hx\Document\Style;

class Paper implements Hx\Document\Style\PaperInterface {
	
	private $size, $oreintation, $uom;
	
	public function __construct()
	{
		$this->reset();
	}
	
	public function getPaperSize()
	{
		return $this->size;
	}
	
	public function setPaperSize($paperSize)
	{
		if ($paperSize != \Hx\Document\Style\PaperInterface::SIZE_A3 && 
			$paperSize != \Hx\Document\Style\PaperInterface::SIZE_A4 &&
			$paperSize != \Hx\Document\Style\PaperInterface::SIZE_B1 && 
			$paperSize != \Hx\Document\Style\PaperInterface::SIZE_B2 &&
			$paperSize != \Hx\Document\Style\PaperInterface::SIZE_LETTER)
			throw new \Hx\Document\DocumentException(
				"unacceptable paper size detected: $paperSize");
		else 
			$this->size = $paperSize;
	}
	
	public function getPaperOreintation()
	{
		return $this->oreintation;
	}

	public function setPaperOreintation($oreintation)
	{
		if ($oreintation != \Hx\Document\Style\PaperInterface::OREINTATION_LANDSCAPE &&
			$oreintation != \Hx\Document\Style\PaperInterface::OREINTATION_POTRAIT)
			throw new \Hx\Document\DocumentException(
				"unacceptable paper oreintation detected: $oreintation");
		else 
			$this->oreintation = $oreintation;
	}
	
	public function getUnitOfMeasure()
	{
		return $this->uom;
	}
	
	public function setUnitOfMeasure($unit)
	{
		if ($unit != \Hx\Document\Style\PaperInterface::UNIT_INCH &&
			$unit != \Hx\Document\Style\PaperInterface::UNIT_MM)
				throw new \Hx\Document\DocumentException(
					"unacceptable paper unit of measure detected: $unit");
				else
					$this->uom = $unit;
	}
	
	public function reset() {
		$this->size = \Hx\Document\Style\PaperInterface::SIZE_A4;
		
		$this->oreintation = \Hx\Document\Style\PaperInterface::OREINTATION_POTRAIT;
		
		$this->uom = \Hx\Document\Style\PaperInterface::UOM_MM;
	}
}
?>