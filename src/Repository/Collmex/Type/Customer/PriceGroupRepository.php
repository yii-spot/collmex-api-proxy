<?php

declare(strict_types=1);

namespace App\Repository\Collmex\Type\Customer;

class PriceGroupRepository implements PriceGroupRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function extractFromRawValue(string $clientRaw): array
    {
        $split = explode(' ', $clientRaw, 2);

        return [
            self::KEY_TYPE_IDENTIFIER => self::VALUE_TYPE_IDENTIFIER,
            self::KEY_CLIENT_ID => null,
            self::KEY_PRICE_GROUP_ID => (int)$split[0],
            self::KEY_NAME => trim($split[1]),
            self::KEY_IS_GROSS_PRICE => null,
            self::KEY_CURRENCY => null
        ];
    }
}