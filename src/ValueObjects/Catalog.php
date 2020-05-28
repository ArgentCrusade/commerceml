<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Catalog extends ValueObject
{
    public $Ид;
    public $ИдКлассификатора;
    public $Наименование;
    public $Описание;
    public $Товары;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'classificator_id' => $this->ИдКлассификатора,
            'name' => $this->Наименование,
            'description' => $this->Описание,
            'products' => $this->transformCollection($this->Товары, ['catalog_id' => $this->Ид]),
        ];
    }
}
