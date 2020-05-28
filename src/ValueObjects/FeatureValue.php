<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class FeatureValue extends ValueObject
{
    public $Ид;
    public $Значение;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'value' => $this->Значение,
        ];
    }
}
