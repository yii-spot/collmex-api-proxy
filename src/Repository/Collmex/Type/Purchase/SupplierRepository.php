<?php

declare(strict_types=1);

namespace App\Repository\Collmex\Type\Purchase;

class SupplierRepository implements SupplierRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function extractFromRawValue(string $supplierRaw): array
    {
        $split = explode(' ', $supplierRaw, 2);

        return [
            self::KEY_SUPPLIER_ID => (int)$split[0],
            self::KEY_TITLE => trim($split[1]),
        ];
    }
}