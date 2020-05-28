<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Tax extends ValueObject
{
    public $Наименование;
    public $Сумма;
    public $Ставка;
    public $УчтеноВСумме;

    public function toArray()
    {
        return [
            'name' => $this->Наименование,
            'amount' => $this->Сумма,
            'rate' => $this->Ставка,
            'in_amount' => $this->toBoolean($this->УчтеноВСумме),
        ];
    }
}
