<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Stock extends ValueObject
{
    public $Ид;
    public $НомерВерсии;
    public $ПометкаУдаления;
    public $Наименование;
    public $Количество;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'version' => $this->НомерВерсии,
            'remove' => $this->toBoolean($this->ПометкаУдаления),
            'name' => $this->Наименование,
            'amount' => $this->Количество,
        ];
    }
}
