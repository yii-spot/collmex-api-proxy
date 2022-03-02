<?php

namespace App\Repository\Collmex\Type\System;

interface CostingTypeRepositoryInterface
{
    public const KEY_COSTING_TYPE_ID = 'costing_type_id';

    public const KEY_TITLE = 'title';

    /**
     * @param string $costingTypeRaw
     * @return array
     */
    public function extractFromRawValue(string $costingTypeRaw): array;
}