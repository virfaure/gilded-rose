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

    public function testQualityIsNeverNegative(){
        $item = new GildedRose('test', 5, 0);
        $item->degrade();

        $this->assertEquals($item->getSellIn(), 4);
        $this->assertEquals($item->getQuality(), 0);
    }

    public function testAgedBrieIncreasesQuality(){
        $item = new GildedRose('Aged Brie', 5, 10);
        $item->degrade();

        $this->assertEquals($item->getSellIn(), 4);
        $this->assertEquals($item->getQuality(), 11);
    }

    public function testSulfurasNeverAltersSellInOrQuality(){
        $item = new GildedRose('Sulfuras', 5, 10);
        $item->degrade();

        $this->assertEquals($item->getSellIn(), 5);
        $this->assertEquals($item->getQuality(), SulfurasQuality::DEFAULT_QUALITY);
    }

    public function testMaxQualityIsNeverReached(){
        $item = new GildedRose('Aged Brie', 5, 50);
        $item->degrade();

        $this->assertEquals($item->getQuality(), AgedBrieQuality::MAX_QUALITY_ALLOWED);
    }

    public function testSulfurasHasAlwaysTheSameQuality(){
        $item = new GildedRose('Sulfuras', 5, 50);
        $item->degrade();

        $this->assertEquals($item->getQuality(), SulfurasQuality::DEFAULT_QUALITY);
    }

    public function testBackstagePassesIncreaseQuality(){
        $item = new GildedRose('Backstage Passes', 50, 30);
        $item->degrade();

        $this->assertEquals($item->getQuality(), 31);
    }

    public function testBackstagePassesIncreaseQualityBy2WhenLess10DaysLeft(){
        $item = new GildedRose('Backstage Passes', 9, 30);
        $item->degrade();

        $this->assertEquals($item->getQuality(), 32);
    }

    public function testBackstagePassesIncreaseQualityBy3WhenLess5DaysLeft(){
        $item = new GildedRose('Backstage Passes', 5, 30);
        $item->degrade();

        $this->assertEquals($item->getQuality(), 33);
    }

    public function testConjuredItemDegradesTwiceAsFast(){
        $item = new GildedRose('Conjured', 5, 30);
        $item->degrade();

        $this->assertEquals($item->getSellIn(), 4);
        $this->assertEquals($item->getQuality(), 28);
    }
}
