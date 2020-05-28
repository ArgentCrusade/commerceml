<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class DictionaryValue extends ValueObject
{
    public $ИдЗначения;
    public $Значение;
    public $Картинка;

    public function toArray()
    {
        return [
            'value_id' => $this->ИдЗначения,
            'value' => $this->Значение,
            'image' => $this->Картинка,
        ];
    }
}
