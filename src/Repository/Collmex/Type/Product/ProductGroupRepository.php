<?php

declare(strict_types=1);

namespace App\Repository\Collmex\Type\Product;

use App\Repository\Collmex\ApiClient\ApiClientInterface;

class ProductGroupRepository implements ProductGroupRepositoryInterface
{
    private ApiClientInterface $apiClient;

    /**
     * @param ApiClientInterface $apiClient
     */
    public function __construct(
        ApiClientInterface $apiClient
    ) {
        $this->apiClient = $apiClient;
    }

    /**
     * @inheritDoc
     */
    public function extractFromRawValue(string $productGroupRaw): array
    {
        $split = explode(' ', $productGroupRaw, 2);

        return [
            self::KEY_TYPE_IDENTIFIER => self::VALUE_TYPE_IDENTIFIER,
            self::KEY_PRODUCT_GROUP_ID => (int)$split[0],
            self::KEY_TITLE => $split[1],
            self::KEY_PARENT_PRODUCT_GROUP => null
        ];
    }
}