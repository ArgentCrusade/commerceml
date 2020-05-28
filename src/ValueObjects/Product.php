<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;
use Illuminate\Support\Str;

class Product extends ValueObject
{
    public $Ид;
    public $НомерВерсии;
    public $ПометкаУдаления;
    public $Штрихкод;
    public $Артикул;
    public $Наименование;
    public $Описание;
    public $Картинка = [];
    public $БазоваяЕдиница;
    public $Группы;
    public $Страна;
    public $Изготовитель;
    public $Вес;
    public $ЗначенияСвойств;
    public $СтавкиНалогов;
    public $ЗначенияРеквизитов;

    // Order-specific fields.
    public $ЦенаЗаЕдиницу;
    public $Количество;
    public $Сумма;
    public $Единица;
    public $Коэффициент;
    public $Налоги;
    public $Скидки;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'version' => $this->НомерВерсии,
            'remove' => $this->toBoolean($this->ПометкаУдаления),
            'barcode' => $this->Штрихкод,
            'sku' => $this->Артикул,
            'name' => $this->Наименование,
            'description' => $this->Описание,
            'images' => $this->Картинка,
            'base_unit' => $this->extractBaseUnit(),
            'groups' => $this->extractGroupIds(),
            'country' => $this->Страна,
            'manufacturer' => $this->transformValueObject($this->Изготовитель, ['product_id' => $this->Ид]),
            'weight' => $this->Вес,
            'features_values' => $this->transformCollection($this->ЗначенияСвойств, ['product_id' => $this->Ид]),
            'tax_rates' => $this->transformCollection($this->СтавкиНалогов, ['product_id' => $this->Ид]),
            'props_values' => $this->transformCollection($this->ЗначенияРеквизитов, ['product_id' => $this->Ид]),
            'unit_price' => $this->ЦенаЗаЕдиницу,
            'quantity' => $this->Количество,
            'amount' => $this->Сумма,
            'unit' => $this->Единица,
            'coefficient' => $this->Коэффициент,
            'taxes' => $this->transformCollection($this->Налоги, ['product_id' => $this->Ид]),
            'discounts' => $this->transformCollection($this->Скидки, ['product_id' => $this->Ид]),
        ];
    }

    protected function extractGroupIds()
    {
        if (!is_array($this->Группы)) {
            return [];
        }

        $groups = [];

        foreach ($this->Группы as $group) {
            if (empty($group['name']) || empty($group['value'])) {
                continue;
            }

            if (Str::endsWith($group['name'], 'Ид')) {
                $groups[] = $group['value'];
            }
        }

        return $groups;
    }

    protected function extractBaseUnit()
    {
        if (!is_array($this->БазоваяЕдиница) && !is_object($this->БазоваяЕдиница)) {
            return $this->БазоваяЕдиница;
        }

        return $this->transformValueObject($this->БазоваяЕдиница, ['product_id' => $this->Ид]);
    }
}
