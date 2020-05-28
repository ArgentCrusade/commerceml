<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Classificator extends ValueObject
{
    public $Ид;
    public $Наименование;
    public $Группы;
    public $Свойства;
    public $ТипыЦен;
    public $Склады;
    public $ЕдиницыИзмерения;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'name' => $this->Наименование,
            'groups' => $this->transformCollection($this->Группы, ['classificator_id' => $this->Ид]),
            'features' => $this->transformCollection($this->Свойства, ['classificator_id' => $this->Ид]),
            'price_types' => $this->transformCollection($this->ТипыЦен, ['classificator_id' => $this->Ид]),
            'stocks' => $this->transformCollection($this->Склады, ['classificator_id' => $this->Ид]),
            'units' => $this->transformCollection($this->ЕдиницыИзмерения, ['classificator_id' => $this->Ид]),
        ];
    }
}
