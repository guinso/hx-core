<?php 
namespace Hx\Document;

class Content implements \Hx\Document\ContentInterface {
	
	private $header, $footer, $pages;
	private $margin, $paperStyle, $title, $author, $pageBreak;
	
	public function __construct(
		\Hx\Document\Component\HeaderInterface $header, 
		\Hx\Document\Component\FooterInterface $footer,
		\Hx\Document\Style\PaperInterface $paperStyle,
		\Hx\Document\Style\MarginInterface $margin)
	{
		$this->pages = array();
		
		$this->header = $header;
		
		$this->footer = $footer;
		
		$this->title = "";
		
		$this->author = "";
		
		$this->pageBreak = true;
		
		$this->paperStyle = $paperStyle;
		
		$this->margin = $margin;
	}
	
	public function getHeader()
	{
		return $this->header;
	}
	
	public function getFooter()
	{
		return $this->footer;
	}
	
	public function getPageByIndex($index)
	{
		if ($index < 0 || $index >= count($this->pages))
			throw new \Hx\Document\DocumentException(
					"Page index ($index) is exceed pages indexes.");
			else
				return $this->pages[$index];
	}
	
	public function getPageQty()
	{
		return count($this->pages);
	}
	
	public function removePageByIndex($index)
	{
		if ($index < 0 || $index >= count($this->pages))
			throw new \Hx\Document\DocumentException(
				"Remove rejected. Index ($index) is exceed pages indexes.");
		else 
			array_splice($this->pages, $index, 1);
	}
	
	public function removePageByObject(\Hx\Document\Component\PageInterface $page)
	{
		if (array_search($page, $this->pages) === false)
			throw new \Hx\Document\DocumentException(
				"Remove rejected. Cannot find targeted page object.");
		else
			array_splice($this->pages, $index, 1);
	}
	
	public function insertPage(\Hx\Document\Component\PageInterface $page)
	{
		$index = array_search($page, $this->pages);
		
		if (!empty($this->pages[$index]))
			throw new \Hx\Document\DocumentException(
				"Insert page rejected. Targeted page object already exist at page index $index.");
		else 
			array_push($this->pages, $page);
	}
	
	public function getMargin()
	{
		return $this->margin;
	}
	
	public function getPaperStyle()
	{
		return $this->paperStyle;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	public function getAuthor()
	{
		return $this->author;
	}
	
	public function setAuthor($author)
	{
		$this->author = $author;
	}
	
	public function isAutoBreak()
	{
		return $this->pageBreak;
	}
	
	public function setAutoBreak($autoBreak)
	{
		$this->pageBreak = $autoBreak;
	}
}
?>