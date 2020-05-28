<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class AddressField extends ValueObject
{
    public $Тип;
    public $Значение;

    public function toArray()
    {
        return [
            'type' => $this->Тип,
            'value' => $this->Значение,
        ];
    }
}
