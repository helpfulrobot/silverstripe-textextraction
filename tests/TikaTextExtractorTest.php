<?php

/**
 * Tests the {@see TikaTextExtractor} class
 */
class TikaTextExtractorTest extends SapphireTest {
	
	function testExtraction() {
		$extractor = new TikaTextExtractor();
		if(!$extractor->isAvailable()) $this->markTestSkipped('tika cli not available');

		// Check file
		$file = Director::baseFolder() . '/textextraction/tests/fixtures/test1.pdf';
		$content = $extractor->getContent($file);
		$this->assertContains('This is a test file with a link', $content);

		// Check mime validation
		$this->assertTrue($extractor->supportsMime('application/pdf'));
		$this->assertTrue($extractor->supportsMime('text/html'));
		$this->assertFalse($extractor->supportsMime('application/not-supported'));
	}

	function testServerExtraction() {
		$extractor = new TikaServerTextExtractor();
		if(!$extractor->isAvailable()) $this->markTestSkipped('tika server not available');

		// Check file
		$file = Director::baseFolder() . '/textextraction/tests/fixtures/test1.pdf';
		$content = $extractor->getContent($file);
		$this->assertContains('This is a test file with a link', $content);

		// Check mime validation
		$this->assertTrue($extractor->supportsMime('application/pdf'));
		$this->assertTrue($extractor->supportsMime('text/html'));
		$this->assertFalse($extractor->supportsMime('application/not-supported'));
	}

}
