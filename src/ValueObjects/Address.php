<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Address extends ValueObject
{
    public $Представление;
    public $Комментарий;
    public $АдресноеПоле;

    public function toArray()
    {
        return [
            'full' => $this->Представление,
            'comment' => $this->Комментарий,
            'address_field' => $this->transformValueObject($this->АдресноеПоле),
        ];
    }
}
