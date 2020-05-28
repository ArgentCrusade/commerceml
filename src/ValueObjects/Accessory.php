<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Accessory extends ValueObject
{
    public $Ид;
    public $Наименование;
    public $Количество;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'name' => $this->Наименование,
            'value' => $this->Количество,
        ];
    }
}
