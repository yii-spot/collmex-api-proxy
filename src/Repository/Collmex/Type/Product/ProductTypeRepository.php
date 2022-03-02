<?php

declare(strict_types=1);

namespace App\Repository\Collmex\Type\Product;

use App\Repository\Collmex\ApiClient\ApiClientInterface;

class ProductTypeRepository implements ProductTypeRepositoryInterface
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
    public function extractFromRawValue(string $productTypeRaw): array
    {
        $split = explode(' ', $productTypeRaw, 2);

        return [
            self::KEY_TYPE_ID => (int)$split[0],
            self::KEY_TITLE => $split[1]
        ];
    }
}