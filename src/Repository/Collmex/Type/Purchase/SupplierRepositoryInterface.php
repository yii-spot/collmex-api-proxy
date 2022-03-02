<?php

namespace App\Repository\Collmex\Type\Purchase;

interface SupplierRepositoryInterface
{
    public const KEY_SUPPLIER_ID = 'supplier_id';

    public const KEY_TITLE = 'title';

    /**
     * @param string $supplierRaw
     * @return array
     */
    public function extractFromRawValue(string $supplierRaw): array;
}