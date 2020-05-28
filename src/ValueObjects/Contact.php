<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Contact extends ValueObject
{
    public $Тип;
    public $Значение;
    public $Комментарий;

    public function toArray()
    {
        return [
            'type' => $this->Тип,
            'value' => $this->Значение,
            'comment' => $this->Комментарий,
        ];
    }
}
