<?php

declare(strict_types=1);

namespace App\Repository\Collmex\Type\System;

class ShippingGroupRepository implements ShippingGroupRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function extractFromRawValue(string $taxRateRaw): array
    {
        $split = explode(' ', $taxRateRaw, 2);

        return [
            self::KEY_SHIPPING_GROUP_ID => (int)$split[0],
            self::KEY_TITLE => trim($split[1]),
        ];
    }
}