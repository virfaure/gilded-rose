<?php


class ItemQualityFactory
{
    public function __construct(Item $item)
    {
        if ($item->name === 'Sulfuras') {
            $this->itemQualityStrategy = new SulfurasQuality($item);
        }elseif($item->name == 'Aged Brie'){
            $this->itemQualityStrategy = new AgedBrieQuality($item);
        }else{
            $this->itemQualityStrategy = new NormalQuality($item);
        }
    }

    public function degradeQuality(){
        $this->itemQualityStrategy->degradeQuality();
    }
}