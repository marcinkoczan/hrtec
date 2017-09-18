<?php


use PHPUnit\Framework\TestCase;

require_once(__DIR__."/../src/class/Rss.php");

/**
 * @covers Rss
 */
final class RssTest extends TestCase
{
   protected $testArray = array();
   
   public function loadNews() {
       $objRss = new Rss('http://feeds.nationalgeographic.com/ng/News/News_Main');
       $this->testArray = $objRss->getNews();
   }
   
   public function testValues() {
       foreach ( $this->testArray as $key => $value) {
           $this->assertArrayHasKey( "title", $this->testArray );
           $this->assertTrue(is_array($this->testArray));
           
            $this->assertNotEmpty($this->testArray['title']);
            $this->assertNotEmpty($this->testArray['description']);
            $this->assertNotEmpty($this->testArray['link']);
            $this->assertNotEmpty($this->testArray['pubDate']);
            $this->assertNotEmpty($this->testArray['creator']);
            
            $this->assertTrue(is_string($this->testArray['title']));
       }
   }
}