<?php

namespace App\Repository\Collmex\Type\Customer;

interface PriceGroupRepositoryInterface
{
    public const KEY_TYPE_IDENTIFIER = 'type_identifier';

    public const KEY_CLIENT_ID = 'client_id';

    public const KEY_PRICE_GROUP_ID = 'price_group_id';

    public const KEY_NAME = 'name';

    public const KEY_IS_GROSS_PRICE = 'gross';

    public const KEY_CURRENCY = 'currency';

    public const VALUE_TYPE_IDENTIFIER = 'PRICE_GROUP';

    /**
     * @param string $clientRaw
     * @return array
     */
    public function extractFromRawValue(string $clientRaw): array;
}