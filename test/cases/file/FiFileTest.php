<?php 
class FiFileTest extends PHPUnit_Framework_TestCase {
	
	public function testEnumerateDir()
	{
		$testRoot = __DIR__ . DIRECTORY_SEPARATOR . 'test';
		
		$expected = array(
			'files' => array(
				DIRECTORY_SEPARATOR . 'dir-a' . DIRECTORY_SEPARATOR . 'dir-c' . DIRECTORY_SEPARATOR . 'sample-e.txt',
				DIRECTORY_SEPARATOR . 'dir-a' . DIRECTORY_SEPARATOR . 'sample-c.txt',
				DIRECTORY_SEPARATOR . 'dir-a' . DIRECTORY_SEPARATOR . 'sample-d.xml',
				DIRECTORY_SEPARATOR . 'dir-b' . DIRECTORY_SEPARATOR . 'sample-e.txt',
				DIRECTORY_SEPARATOR . 'sample-a.txt',
				DIRECTORY_SEPARATOR . 'sample-b.tpl',
			),
			'dirs' => array(
				DIRECTORY_SEPARATOR . 'dir-a',
				DIRECTORY_SEPARATOR . 'dir-a' . DIRECTORY_SEPARATOR . 'dir-c',
				DIRECTORY_SEPARATOR . 'dir-b'
			)
		);
		
		$file = new \Hx\File\File();
		
		$result = $file->getDirectories($testRoot);
		
		$this->assertEquals($expected, $result);
	}
	
	public function testDeleteFile()
	{
		$filePath = __DIR__ . DIRECTORY_SEPARATOR . 'dub-sample.txt';
		
		copy(__DIR__ . DIRECTORY_SEPARATOR . 'sample.txt', $filePath);
		
		$file = new \Hx\File\File();
		
		$file->deleteFile($filePath);
		
		$this->assertFalse(file_exists($filePath));
	}
	
	public function testRecursiveDir()
	{
		$file = new \Hx\File\File();
		
		$testDir = __DIR__ . DIRECTORY_SEPARATOR . 'test';
		
		$counter = 0;
		
		$file->recursiveDir($testDir, function($filepath) use (&$counter) {
			$counter++;
		}, "/^.+\.txt$/");
		
		$this->assertEquals(4, $counter);
	}
}
?>