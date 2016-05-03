<?php


class GildedRoseTest extends PHPUnit_Framework_TestCase
{
    public function testDegradeQualityAndSellIn(){
        $item = new GildedRose('test', 10, 20);
        $item->degrade();

        $this->assertEquals($item->getSellIn(), 9);
        $this->assertEquals($item->getQuality(), 19);

    }
}
