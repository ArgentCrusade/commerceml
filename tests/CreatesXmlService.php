<?php

namespace ArgentCrusade\CommerceML\Tests;

use ArgentCrusade\CommerceML\ValueObjects\Accessory;
use ArgentCrusade\CommerceML\ValueObjects\Address;
use ArgentCrusade\CommerceML\ValueObjects\AddressField;
use ArgentCrusade\CommerceML\ValueObjects\Bank;
use ArgentCrusade\CommerceML\ValueObjects\Catalog;
use ArgentCrusade\CommerceML\ValueObjects\CheckingAccount;
use ArgentCrusade\CommerceML\ValueObjects\Classificator;
use ArgentCrusade\CommerceML\ValueObjects\CommercialInfo;
use ArgentCrusade\CommerceML\ValueObjects\Contact;
use ArgentCrusade\CommerceML\ValueObjects\Contractor;
use ArgentCrusade\CommerceML\ValueObjects\CorrespondentBank;
use ArgentCrusade\CommerceML\ValueObjects\DictionaryValue;
use ArgentCrusade\CommerceML\ValueObjects\Discount;
use ArgentCrusade\CommerceML\ValueObjects\Document;
use ArgentCrusade\CommerceML\ValueObjects\Feature;
use ArgentCrusade\CommerceML\ValueObjects\FeatureValue;
use ArgentCrusade\CommerceML\ValueObjects\Group;
use ArgentCrusade\CommerceML\ValueObjects\Manufacturer;
use ArgentCrusade\CommerceML\ValueObjects\Offer;
use ArgentCrusade\CommerceML\ValueObjects\OffersPackage;
use ArgentCrusade\CommerceML\ValueObjects\Price;
use ArgentCrusade\CommerceML\ValueObjects\PriceType;
use ArgentCrusade\CommerceML\ValueObjects\Product;
use ArgentCrusade\CommerceML\ValueObjects\ProductDetail;
use ArgentCrusade\CommerceML\ValueObjects\PropValue;
use ArgentCrusade\CommerceML\ValueObjects\Remainder;
use ArgentCrusade\CommerceML\ValueObjects\Representative;
use ArgentCrusade\CommerceML\ValueObjects\Stock;
use ArgentCrusade\CommerceML\ValueObjects\Tax;
use ArgentCrusade\CommerceML\ValueObjects\TaxRate;
use ArgentCrusade\CommerceML\ValueObjects\Unit;
use Sabre\Xml\Service;

trait CreatesXmlService
{
    protected function createService()
    {
        $valueObjectsMap = [
            'КоммерческаяИнформация' => CommercialInfo::class,
            'Классификатор' => Classificator::class,
            'Каталог' => Catalog::class,
            'Группа' => Group::class,
            'ПакетПредложений' => OffersPackage::class,
            'Предложение' => Offer::class,
            'Цена' => Price::class,
            'ТипЦены' => PriceType::class,
            'Налог' => Tax::class,
            'Свойство' => Feature::class,
            'Справочник' => DictionaryValue::class,
            'Товар' => Product::class,
            'ХарактеристикаТовара' => ProductDetail::class,
            'Комплектующее' => Accessory::class,
            'Остаток' => Remainder::class,
            'Изготовитель' => Manufacturer::class,
            'ЗначенияСвойства' => FeatureValue::class,
            'СтавкаНалога' => TaxRate::class,
            'ЗначениеРеквизита' => PropValue::class,
            'Склад' => Stock::class,
            'Контрагент' => Contractor::class,
            'РасчетныйСчет' => CheckingAccount::class,
            'Банк' => Bank::class,
            'БанкКорреспондент' => CorrespondentBank::class,
            'Представитель' => Representative::class,
            'Адрес' => Address::class,
            'АдресРегистрации' => Address::class,
            'АдресноеПоле' => AddressField::class,
            'Контакт' => Contact::class,
            'ЕдиницаИзмерения' => Unit::class,
            'Скидка' => Discount::class,
            'Документ' => Document::class,
        ];

        $namespaces = [
            'urn:1C.ru:commerceml_3',
            'urn:1C.ru:commerceml_2',
        ];

        $service = new Service();

        foreach ($namespaces as $namespace) {
            foreach ($valueObjectsMap as $section => $valueObjectClass) {
                $service->mapValueObject('{'.$namespace.'}'.$section, $valueObjectClass);
            }
        }

        return $service;
    }
}
