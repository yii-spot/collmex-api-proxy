<?php

namespace App\Repository\Collmex\Type\Product;

interface ProductGroupRepositoryInterface
{
    public const KEY_TYPE_IDENTIFIER = 'type_identifier';

    public const KEY_PRODUCT_GROUP_ID = 'product_group_id';

    public const KEY_TITLE = 'title';

    public const KEY_PARENT_PRODUCT_GROUP = 'parent';

    public const VALUE_TYPE_IDENTIFIER = 'PRDGRP';

    /**
     * @param string $productGroupRaw
     * @return array
     */
    public function extractFromRawValue(string $productGroupRaw): array;
}