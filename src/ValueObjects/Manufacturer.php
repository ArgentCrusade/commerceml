<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Manufacturer extends ValueObject
{
    public $Ид;
    public $Наименование;
    public $ОфициальноеНаименование;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'name' => $this->Наименование,
            'official_name' => $this->ОфициальноеНаименование,
        ];
    }
}
