<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Representative extends ValueObject
{
    public $Ид;
    public $Наименование;
    public $Отношение;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'name' => $this->Наименование,
            'relationship' => $this->Отношение,
        ];
    }
}
