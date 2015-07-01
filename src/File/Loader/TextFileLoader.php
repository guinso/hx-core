<?php 
namespace Hx\File\Loader;

class TextFileLoader implements \Hx\File\LoaderInterface {
	
	public function load($filePath, Array $option)
	{
		if(!file_exists($filePath))
			Throw new \Hx\File\FileException("Source file <$source> not found.");
		else if(!is_readable($filePath))
			Throw new \Hx\File\FileException("Source file <$source> is not readable");
		else
			return file_get_contents($filePath);
	}
}
?>