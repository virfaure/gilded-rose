<?php


class ConjuredQuality
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

    public function updateQuality()
    {
        $this->item->quality = $this->item->quality - 2;
    }
}