<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Discount extends ValueObject
{
    public $Наименование;
    public $Сумма;
    public $УчтеноВСумме;

    public function toArray()
    {
        return [
            'name' => $this->Наименование,
            'amount' => $this->Сумма,
            'included' => $this->toBoolean($this->УчтеноВСумме),
        ];
    }
}
