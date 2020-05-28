<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Group extends ValueObject
{
    public $Ид;
    public $НомерВерсии;
    public $ПометкаУдаления;
    public $Наименование;
    public $Группы;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'version' => $this->НомерВерсии,
            'remove' => $this->toBoolean($this->ПометкаУдаления),
            'name' => $this->Наименование,
            'groups' => $this->transformCollection($this->Группы, ['parent_id' => $this->Ид]),
        ];
    }
}
