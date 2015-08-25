<?php 
namespace Hx\Document\Context;

interface ContextInterface {
	
	public function getHeader();
	
	public function getFooter();
	
	public function getPageByIndex($index);
	
	public function getPageQty();
	
	public function removePageByIndex($index);
	
	public function removePageByObject(\Hx\Document\Context\Component\PageInterface $page);
	
	public function insertPage(\Hx\Document\Context\Component\PageInterface $page);
	
	public function getMargin();
	
	public function getPaperStyle();
	
	public function getTitle();
	
	public function setTitle($title);
	
	public function getAuthor();
	
	public function setAuthor($author);
	
	public function isAutoBreak();
	
	public function setAutoBreak($autoBreak);
}
?>