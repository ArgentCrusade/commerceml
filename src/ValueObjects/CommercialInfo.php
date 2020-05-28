<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class CommercialInfo extends ValueObject
{
    public $Классификатор;
    public $Каталог;
    public $ПакетПредложений;
    public $Документ = [];
    public $Контрагенты;

    public function toArray()
    {
        return [
            'classificator' => $this->transformValueObject($this->Классификатор),
            'catalog' => $this->transformValueObject($this->Каталог),
            'offers_package' => $this->transformValueObject($this->ПакетПредложений),
            'documents' => $this->transformCollection($this->Документ),
            'contractors' => $this->transformCollection($this->Контрагенты),
        ];
    }
}
