<?php

namespace ArgentCrusade\CommerceML;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Sabre\Xml\Service;

class Parser
{
    protected Service $xmlService;

    public function __construct(Service $xmlService)
    {
        $this->xmlService = $xmlService;
    }

    public function parse(string $filename, bool $withTransformations = true): array
    {
        $results = $this->xmlService->parse(
            file_get_contents($filename)
        );

        if (!$withTransformations) {
            return $results;
        }

        if ($results instanceof ValueObject) {
            $results = [$results];
        }

        $transformed = $this->transformResults($results);

        if (count($transformed) === 1 && isset($transformed['commercial_info'])) {
            return $transformed['commercial_info'];
        }

        return $transformed;
    }

    protected function transformResults(array $results): array
    {
        return (new Collection($results))
            ->map(function ($item) {
                if ($item instanceof ValueObject) {
                    return $item;
                } elseif (is_array($item) && !empty($item['value']) && ($item['value'] instanceof ValueObject)) {
                    return $item['value'];
                }

                return null;
            })
            ->reject(null)
            ->mapWithKeys(fn (ValueObject $item) => [$this->getValueKey($item) => $item->toArray()])
            ->toArray();
    }

    protected function getValueKey(ValueObject $object): string
    {
        return Str::snake(
            basename(str_replace('\\', '/', get_class($object)))
        );
    }
}
