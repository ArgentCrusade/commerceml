<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class PropValue extends ValueObject
{
    public $Наименование;
    public $Значение;

    public function toArray()
    {
        return [
            'name' => $this->Наименование,
            'value' => $this->Значение,
        ];
    }
}
