<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Offer extends ValueObject
{
    public $Ид;
    public $НомерВерсии;
    public $ПометкаУдаления;
    public $Наименование;
    public $Штрихкод;
    public $ХарактеристикиТовара;
    public $ЗначенияСвойств;
    public $Комплектующие;
    public $Цены;
    public $Остатки;

    public function toArray()
    {
        $offerId = $this->extractId();
        $productId = $this->extractProductId();

        return [
            'id' => $offerId,
            'product_id' => $productId,
            'version' => $this->НомерВерсии,
            'remove' => $this->toBoolean($this->ПометкаУдаления),
            'name' => $this->Наименование,
            'barcode' => $this->Штрихкод,
            'product_details' => $this->transformCollection($this->ХарактеристикиТовара, [
                'offer_id' => $offerId,
                'product_id' => $productId,
            ]),
            'feature_values' => $this->transformCollection($this->ЗначенияСвойств, [
                'offer_id' => $offerId,
                'product_id' => $productId,
            ]),
            'accessories' => $this->transformCollection($this->Комплектующие, [
                'offer_id' => $offerId,
                'product_id' => $productId,
            ]),
            'prices' => $this->transformCollection($this->Цены, [
                'offer_id' => $offerId,
                'product_id' => $productId,
            ]),
            'rests' => $this->transformCollection($this->Остатки, [
                'offer_id' => $offerId,
                'product_id' => $productId,
            ]),
        ];
    }

    protected function extractId()
    {
        if (strpos($this->Ид, '#') === false) {
            return $this->Ид;
        }

        $id = explode('#', $this->Ид);

        return $id[1] ?? $this->Ид;
    }

    protected function extractProductId()
    {
        if (strpos($this->Ид, '#') === false) {
            return $this->Ид;
        }

        $id = explode('#', $this->Ид);

        return $id[0] ?? $this->Ид;
    }
}
