<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Bank extends ValueObject
{
    public $Наименование;
    public $СчетКорреспондентский;
    public $БИК;

    public function toArray()
    {
        return [
            'name' => $this->Наименование,
            'correspondent_account' => $this->СчетКорреспондентский,
            'bic' => $this->БИК,
        ];
    }
}
