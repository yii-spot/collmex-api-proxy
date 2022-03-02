<?php

declare(strict_types=1);

namespace App\Repository\Collmex\Type\System;

class CostingTypeRepository implements CostingTypeRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function extractFromRawValue(string $costingTypeRaw): array
    {
        $split = explode(' ', $costingTypeRaw, 2);

        return [
            self::KEY_COSTING_TYPE_ID => (int)$split[0],
            self::KEY_TITLE => trim($split[1]),
        ];
    }
}