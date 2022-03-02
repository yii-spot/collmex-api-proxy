<?php

namespace App\Repository\Collmex\Type\Product;

interface ProductTypeRepositoryInterface
{
    public const KEY_TYPE_ID = 'product_type_id';

    public const KEY_TITLE = 'title';

    /**
     * @param string $productGroupRaw
     * @return array
     */
    public function extractFromRawValue(string $productGroupRaw): array;
}