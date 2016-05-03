<?php


class AgedBrieQuality
{

    /**
     * @var Item $item
     */
    private $item;

    /**
     * @param Item $item
     */
    public function __construct($item)
    {
        $this->item = $item;
    }

    public function degradeQuality()
    {
        $this->increaseQuality();
    }

    /**
     * @return int
     */
    private function increaseQuality()
    {
        return $this->item->quality++;
    }
}