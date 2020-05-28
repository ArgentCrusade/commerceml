<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Contractor extends ValueObject
{
    public $Ид;
    public $НомерВерсии;
    public $ПометкаУдаления;
    public $Наименование;
    public $ОфициальноеНаименование;
    public $ПолноеНаименование;
    public $Роль;
    public $ИНН;
    public $КПП;
    public $КодПоОКПО;
    public $РасчетныеСчета;
    public $Представители;
    public $АдресРегистрации;
    public $Контакты;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'version' => $this->НомерВерсии,
            'remove' => $this->toBoolean($this->ПометкаУдаления),
            'name' => $this->Наименование,
            'official_name' => $this->ОфициальноеНаименование,
            'full_name' => $this->ПолноеНаименование,
            'role' => $this->Роль,
            'vat_id' => $this->ИНН,
            'kpp' => $this->КПП,
            'okpo_code' => $this->КодПоОКПО,
            'checking_accounts' => $this->transformCollection($this->РасчетныеСчета, ['contractor_id' => $this->Ид]),
            'representatives' => $this->transformCollection($this->Представители, ['contractor_id' => $this->Ид]),
            'registration_address' => $this->transformValueObject($this->АдресРегистрации, ['contractor_id' => $this->Ид]),
            'contacts' => $this->transformCollection($this->Контакты, ['contractor_id' => $this->Ид]),
        ];
    }
}
