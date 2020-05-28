<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Feature extends ValueObject
{
    public $Ид;
    public $НомерВерсии;
    public $ПометкаУдаления;
    public $Наименование;
    public $Внешний;
    public $Информационное;
    public $ТипЗначений;
    public $ВариантыЗначений;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'version' => $this->НомерВерсии,
            'remove' => $this->ПометкаУдаления,
            'name' => $this->Наименование,
            'is_external' => $this->toBoolean($this->Внешний),
            'is_informational' => $this->toBoolean($this->Информационное),
            'values_type' => $this->ТипЗначений,
            'values' => $this->transformCollection($this->ВариантыЗначений, ['feature_id' => $this->Ид]),
        ];
    }
}
