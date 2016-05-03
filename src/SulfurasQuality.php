<?php


class SulfurasQuality
{
    const DEFAULT_QUALITY = 80;

    /**
     * @var Item $item
     */
    private $item;

    /**
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
        $this->setDefaultQuality();
    }

    /**
     * return null
     */
    public function degradeQuality(){
        return null;
    }

    private function setDefaultQuality()
    {
        $this->item->quality = self::DEFAULT_QUALITY;
    }
}