<?php


class AgedBrieQuality
{
    const MAX_QUALITY_ALLOWED = 50;

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
        $this->increaseQuality();
    }

    private function increaseQuality()
    {
        $this->item->quality++;
        $this->setMaxQuality();
    }

    private function setMaxQuality()
    {
        if ($this->item->quality > self::MAX_QUALITY_ALLOWED) {
            $this->item->quality = self::MAX_QUALITY_ALLOWED;
        }
    }
}