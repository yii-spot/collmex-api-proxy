<?php

namespace App\Repository\Collmex\Type\System;

interface TaxRateRepositoryInterface
{
    public const KEY_TAX_RATE_ID = 'tax_rate_id';

    public const KEY_TITLE = 'title';

    public const KEY_VALUE = 'value';

    /**
     * @param string $taxRateRaw
     * @return array
     */
    public function extractFromRawValue(string $taxRateRaw): array;
}