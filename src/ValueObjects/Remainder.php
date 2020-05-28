<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Remainder extends ValueObject
{
    public $Количество;
    public $Склад;

    public function toArray()
    {
        return [
            'amount' => $this->Количество,
            'stock' => $this->transformValueObject($this->Склад),
        ];
    }
}
