<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class PriceType extends ValueObject
{
    public $Ид;
    public $НомерВерсии;
    public $ПометкаУдаления;
    public $Наименование;
    public $Валюта;
    public $Налог;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'version' => $this->НомерВерсии,
            'remove' => $this->toBoolean($this->ПометкаУдаления),
            'name' => $this->Наименование,
            'currency' => $this->Валюта,
            'tax' => $this->transformValueObject($this->Налог, ['price_type_id' => $this->Ид]),
        ];
    }
}
