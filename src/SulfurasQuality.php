<?php


class SulfurasQuality
{

    private $item;

    /**
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * return null
     */
    public function degradeQuality(){
        return null;
    }
}