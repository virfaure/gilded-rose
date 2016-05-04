<?php


class GildedRose
{

    /**
     * @param array $items
     */
    public function updateCatalogByEndOfDay($items)
    {
        foreach($items as $item){
            $this->updateQualityOfItem($item);
        }
    }

    /**
     * @param $item
     */
    private function updateQualityOfItem(Item $item)
    {
        $itemQuality = new ItemQualityFactory($item);
        $itemQuality->updateQuality();

        $this->updateSellInOfItem($item);
    }

    /**
     * @param $item
     */
    private function updateSellInOfItem(Item $item)
    {
        if ($item->name !== 'Sulfuras') {
            $item->sell_in--;
        }
    }
}