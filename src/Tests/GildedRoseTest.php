<?php


class GildedRoseTest extends PHPUnit_Framework_TestCase
{
    public function testDegradeQualityAndSellIn(){
        $item = new Item('test', 10, 20);
        $gildedRose = new GildedRose();
        $gildedRose->updateCatalogByEndOfDay([$item]);

        $this->assertEquals($item->sell_in, 9);
        $this->assertEquals($item->quality, 19);
    }

    public function testQualityDegradesTwiceAsFast(){
        $item = new Item('test', 0, 20);
        $gildedRose = new GildedRose();
        $gildedRose->updateCatalogByEndOfDay([$item]);

        $this->assertEquals($item->sell_in, -1);
        $this->assertEquals($item->quality, 18);
    }

    public function testQualityIsNeverNegative(){
        $item = new Item('test', 5, 0);
        $gildedRose = new GildedRose();
        $gildedRose->updateCatalogByEndOfDay([$item]);

        $this->assertEquals($item->sell_in, 4);
        $this->assertEquals($item->quality, 0);
    }

    public function testAgedBrieIncreasesQuality(){
        $item = new Item('Aged Brie', 5, 10);
        $gildedRose = new GildedRose();
        $gildedRose->updateCatalogByEndOfDay([$item]);

        $this->assertEquals($item->sell_in, 4);
        $this->assertEquals($item->quality, 11);
    }

    public function testSulfurasNeverAltersSellInOrQuality(){
        $item = new Item('Sulfuras', 5, 10);
        $gildedRose = new GildedRose();
        $gildedRose->updateCatalogByEndOfDay([$item]);;

        $this->assertEquals($item->sell_in, 5);
        $this->assertEquals($item->quality, SulfurasQuality::DEFAULT_QUALITY);
    }

    public function testMaxQualityIsNeverReached(){
        $item = new Item('Aged Brie', 5, 50);
        $gildedRose = new GildedRose();
        $gildedRose->updateCatalogByEndOfDay([$item]);

        $this->assertEquals($item->quality, AgedBrieQuality::MAX_QUALITY_ALLOWED);
    }

    public function testSulfurasHasAlwaysTheSameQuality(){
        $item = new Item('Sulfuras', 5, 50);
        $gildedRose = new GildedRose();
        $gildedRose->updateCatalogByEndOfDay([$item]);

        $this->assertEquals($item->quality, SulfurasQuality::DEFAULT_QUALITY);
    }

    public function testBackstagePassesIncreaseQuality(){
        $item = new Item('Backstage Passes', 50, 30);
        $gildedRose = new GildedRose();
        $gildedRose->updateCatalogByEndOfDay([$item]);

        $this->assertEquals($item->quality, 31);
    }

    public function testBackstagePassesIncreaseQualityBy2WhenLess10DaysLeft(){
        $item = new Item('Backstage Passes', 9, 30);
        $gildedRose = new GildedRose();
        $gildedRose->updateCatalogByEndOfDay([$item]);

        $this->assertEquals($item->quality, 32);
    }

    public function testBackstagePassesIncreaseQualityBy3WhenLess5DaysLeft(){
        $item = new Item('Backstage Passes', 5, 30);
        $gildedRose = new GildedRose();
        $gildedRose->updateCatalogByEndOfDay([$item]);

        $this->assertEquals($item->quality, 33);
    }

    public function testConjuredItemDegradesTwiceAsFast(){
        $item = new Item('Conjured', 5, 30);
        $gildedRose = new GildedRose();
        $gildedRose->updateCatalogByEndOfDay([$item]);

        $this->assertEquals($item->sell_in, 4);
        $this->assertEquals($item->quality, 28);
    }
}
