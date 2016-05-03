<?php


class GildedRose
{
    private $item;

    public function __construct($name, $sellIn, $quality)
    {
        $this->item = new Item($name, $sellIn, $quality);
    }

    public function degrade()
    {
        $itemQuality = new ItemQualityFactory($this->item);
        $itemQuality->degradeQuality();

        if($this->getName() !== 'Sulfuras'){
            $this->lowerSellIn();
        }
    }

    /**
     * @return int
     */
    private function lowerSellIn()
    {
        return $this->item->sell_in--;
    }

    /**
     * @return int
     */
    public function getSellIn()
    {
        return $this->item->sell_in;
    }

    /**
     * @return int
     */
    public function getQuality()
    {
        return $this->item->quality;
    }

    /**
     * @return string
     */
    private function getName()
    {
        return $this->item->name;
    }
}