<?php

namespace ArgentCrusade\CommerceML\ValueObjects;

use ArgentCrusade\CommerceML\ValueObject;

class Document extends ValueObject
{
    public $Ид;
    public $Номер;
    public $Номер1С;
    public $Дата;
    public $Дата1С;
    public $ПометкаУдаления;
    public $ХозОперация;
    public $Основание;
    public $Роль;
    public $Валюта;
    public $Курс;
    public $Сумма;
    public $Контрагенты;
    public $Склады;
    public $Время;
    public $Комментарий;
    public $Налоги;
    public $Товары;
    public $Скидки;
    public $ЗначенияРеквизитов;

    public function toArray()
    {
        return [
            'id' => $this->Ид,
            'number' => $this->Номер,
            'number_1c' => $this->Номер1С,
            'date' => $this->Дата,
            'date_1c' => $this->Дата1С,
            'remove' => $this->toBoolean($this->ПометкаУдаления),
            'operation' => $this->operation(),
            'reason' => $this->Основание,
            'role' => $this->Роль,
            'currency' => $this->Валюта,
            'currency_rate' => $this->Курс,
            'amount' => $this->Сумма,
            'contractors' => $this->transformCollection($this->Контрагенты, ['document_id' => $this->Ид]),
            'stocks' => $this->transformCollection($this->Склады, ['document_id' => $this->Ид]),
            'time' => $this->Время,
            'comment' => $this->Комментарий,
            'taxes' => $this->transformCollection($this->Налоги, ['document_id' => $this->Ид]),
            'products' => $this->transformCollection($this->Товары, ['document_id' => $this->Ид]),
            'discounts' => $this->transformCollection($this->Скидки, ['document_id' => $this->Ид]),
            'prop_values' => $this->transformCollection($this->ЗначенияРеквизитов, ['document_id' => $this->Ид]),
        ];
    }

    protected function operation()
    {
        return [
            'original' => $this->ХозОперация,
            'alias' => $this->operationAlias(),
        ];
    }

    protected function operationAlias()
    {
        switch ($this->ХозОперация) {
            case 'Заказ товара':
                return 'order';
            case 'Счет на оплату':
                return 'bill';
            case 'Отпуск товара':
                return 'delivery';
            case 'Счет-фактура':
                return 'invoice';
            case 'Возврат товара':
                return 'product_return';
            case 'Передача товара на комиссию':
                return 'product_comission_transfer';
            case 'Возврат комиссионного товара':
                return 'comission_product_return';
            case 'Отчет о продажах комиссионного товара':
                return 'comission_product_report';
            case 'Выплата наличных денег':
                return 'cash_payment';
            case 'Возврат наличных денег':
                return 'cash_refund';
            case 'Выплата безналичных денег':
                return 'bank_payment';
            case 'Возврат безналичных денег':
                return 'bank_refund';
            case 'Передача прав':
                return 'rights_transfer';
            case 'Прочие':
            default:
                return 'other';
        }
    }
}
