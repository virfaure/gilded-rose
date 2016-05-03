<?php


class BackstagePassesQuality
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

        if($this->item->sell_in <= 10){
            $this->item->quality++;
        }

        if($this->item->sell_in <= 5){
            $this->item->quality++;
        }

        $this->setQualityAfterConcert();

        $this->setMaxQuality();
    }

    private function setMaxQuality()
    {
        if ($this->item->quality > self::MAX_QUALITY_ALLOWED) {
            $this->item->quality = self::MAX_QUALITY_ALLOWED;
        }
    }

    private function setQualityAfterConcert()
    {
        if ($this->item->sell_in <= 0) {
            $this->item->quality = 0;
        }
    }
}