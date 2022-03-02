<?php

declare(strict_types=1);

namespace App\Repository\Collmex\Type\System;

class TaxRateRepository implements TaxRateRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function extractFromRawValue(string $taxRateRaw): array
    {
        $split = explode(' ', $taxRateRaw, 2);
        $taxRateValueSplit = explode('%', trim($split[1]), 2);

        return [
            self::KEY_TAX_RATE_ID => (int)$split[0],
            self::KEY_TITLE => trim($split[1]),
            self::KEY_VALUE => (int)$taxRateValueSplit[0]
        ];
    }
}