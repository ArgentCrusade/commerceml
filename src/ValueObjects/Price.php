<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Price extends ValueObject
{
    public $Представление;
    public $ИдТипаЦены;
    public $ЦенаЗаЕдиницу;
    public $Валюта;
    public $Налог;

    public function toArray()
    {
        return [
            'full' => $this->Представление,
            'price_type_id' => $this->ИдТипаЦены,
            'unit_price' => $this->ЦенаЗаЕдиницу,
            'currency' => $this->Валюта,
            'tax' => $this->transformValueObject($this->Налог),
        ];
    }
}
