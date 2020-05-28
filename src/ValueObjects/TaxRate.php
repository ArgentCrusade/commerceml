<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class TaxRate extends ValueObject
{
    public $Наименование;
    public $Ставка;

    public function toArray()
    {
        return [
            'name' => $this->Наименование,
            'rate' => $this->Ставка,
        ];
    }
}
