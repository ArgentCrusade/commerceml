<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class CheckingAccount extends ValueObject
{
    public $НомерСчета;
    public $Банк;
    public $БанкКорреспондент;

    public function toArray()
    {
        return [
            'account' => $this->НомерСчета,
            'bank' => $this->transformValueObject($this->Банк),
            'correspondent_bank' => $this->transformValueObject($this->БанкКорреспондент),
        ];
    }
}
