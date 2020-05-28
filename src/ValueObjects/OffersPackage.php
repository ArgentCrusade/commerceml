<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class OffersPackage extends ValueObject
{
    public $Ид;
    public $Наименование;
    public $ИдКаталога;
    public $ИдКлассификатора;
    public $Предложения;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'name' => $this->Наименование,
            'catalog_id' => $this->ИдКаталога,
            'classificator_id' => $this->ИдКлассификатора,
            'offers' => $this->transformCollection($this->Предложения, ['offers_package_id' => $this->Ид]),
        ];
    }
}
