<?php

namespace ArgentCrusade\CommerceML;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

abstract class ValueObject implements Arrayable
{
    abstract public function toArray();

    protected function transformValueObject($field, array $append = [])
    {
        $field = $this->normalizeValueObject($field);

        if (is_null($field)) {
            return [];
        }

        return array_merge($field->toArray(), $append);
    }

    protected function transformCollection($items, array $append = []): array
    {
        if (is_null($items) || !is_array($items) || !count($items)) {
            return [];
        }

        return (new Collection($items))
            ->map(fn ($item) => $this->transformValueObject($item, $append))
            ->reject(null)
            ->toArray();
    }

    protected function normalizeValueObject($field): ?ValueObject
    {
        if ($field instanceof ValueObject) {
            return $field;
        } elseif (!empty($field['value']) && ($field['value'] instanceof ValueObject)) {
            return $field['value'];
        }

        return null;
    }

    protected function toBoolean($value): bool
    {
        if (is_bool($value)) {
            return $value;
        } elseif (is_numeric($value)) {
            return boolval(floatval($value));
        }

        if ($value === 'true') {
            return true;
        } elseif ($value === 'false') {
            return false;
        }

        return !empty($value);
    }
}
