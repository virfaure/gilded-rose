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
        $this->item->sell_in--;
        $this->lowerQuality();
    }

    public function getSellIn()
    {
        return $this->item->sell_in;
    }

    public function getQuality()
    {
        return $this->item->quality;
    }

    private function lowerQuality()
    {
        if ($this->getQuality() == 0) {
            return;
        }

        $this->item->quality--;

        if ($this->getSellIn() <= 0) {
            $this->item->quality--;
        }
    }
}