<?php


class DefaultQuality implements ItemQualityInterface
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
        if ($this->item->quality == 0) {
            return $this->item->quality;
        }

        $this->item->quality--;

        if ($this->item->sell_in <= 0) {
            $this->item->quality--;
        }

        return $this->item->quality;
    }
}