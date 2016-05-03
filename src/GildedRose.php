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
        $this->lowerSellIn();

        if ($this->getName() === 'Aged Brie') {
            $this->item->quality++;
        }else {
            $this->lowerQuality();
        }
    }

    /**
     * @return int
     */
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