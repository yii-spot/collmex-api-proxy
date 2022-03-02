<?php

namespace App\Repository\Collmex\Type\System;

interface ShippingGroupRepositoryInterface
{
    public const KEY_SHIPPING_GROUP_ID = 'shipping_group_id';

    public const KEY_TITLE = 'title';

    /**
     * @param string $taxRateRaw
     * @return array
     */
    public function extractFromRawValue(string $taxRateRaw): array;
}