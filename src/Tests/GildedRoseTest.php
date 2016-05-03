<?php


class GildedRoseTest extends PHPUnit_Framework_TestCase
{
    public function testDegradeQualityAndSellIn(){
        $item = new GildedRose('test', 10, 20);
        $item->degrade();

        $this->assertEquals($item->getSellIn(), 9);
        $this->assertEquals($item->getQuality(), 19);

    }

    public function testQualityDegradesTwiceAsFast(){
        $item = new GildedRose('test', 0, 20);
        $item->degrade();

        $this->assertEquals($item->getSellIn(), -1);
        $this->assertEquals($item->getQuality(), 18);
    }
}
