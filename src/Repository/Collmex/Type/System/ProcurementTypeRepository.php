<?php

declare(strict_types=1);

namespace App\Repository\Collmex\Type\System;

class ProcurementTypeRepository implements ProcurementTypeRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function extractFromRawValue(string $procurementTypeRaw): array
    {
        $split = explode(' ', $procurementTypeRaw, 2);

        return [
            self::KEY_PROCUREMENT_TYPE_ID => (int)$split[0],
            self::KEY_TITLE => trim($split[1])
        ];
    }
}