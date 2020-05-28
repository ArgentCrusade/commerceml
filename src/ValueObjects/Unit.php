<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Unit extends ValueObject
{
    public $Ид;
    public $НомерВерсии;
    public $ПометкаУдаления;
    public $НаименованиеКраткое;
    public $Код;
    public $НаименованиеПолное;
    public $МеждународноеСокращение;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'version' => $this->НомерВерсии,
            'delete' => $this->toBoolean($this->ПометкаУдаления),
            'short_name' => $this->НаименованиеКраткое,
            'full_name' => $this->НаименованиеПолное,
            'abbreviation' => $this->МеждународноеСокращение,
            'code' =>  $this->Код,
        ];
    }
}
