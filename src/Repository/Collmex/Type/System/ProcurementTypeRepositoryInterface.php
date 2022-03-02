<?php

namespace App\Repository\Collmex\Type\System;

interface ProcurementTypeRepositoryInterface
{
    public const KEY_PROCUREMENT_TYPE_ID = 'procurement_type_id';

    public const KEY_TITLE = 'title';

    /**
     * @param string $procurementTypeRaw
     * @return array
     */
    public function extractFromRawValue(string $procurementTypeRaw): array;
}