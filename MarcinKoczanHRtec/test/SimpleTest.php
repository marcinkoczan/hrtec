<?php


use PHPUnit\Framework\TestCase;

require_once(__DIR__."/../src/class/Rss.php");
require_once(__DIR__."/../src/class/Simple.php");

/**
 * @covers Simple
 */
final class SimpleTest extends TestCase
{
   protected $testArray = array();
   private $objSimple;
   
   public function setup() {
       $objRss = new Rss('http://feeds.nationalgeographic.com/ng/News/News_Main');
       $this->testArray = $objRss->getNews();
       $this->objSimple = new Simple( "eksport_prosty.csv",$this->testArray );
   }
   
   public function testSave() { 
       $this->assertTrue( $this->objSimple->saveFile() ); 
   }
}