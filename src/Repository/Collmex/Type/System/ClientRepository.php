<?php

declare(strict_types=1);

namespace App\Repository\Collmex\Type\System;

class ClientRepository implements ClientRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function extractFromRawValue(string $clientRaw): array
    {
        $split = explode(' ', $clientRaw, 2);

        return [
            self::KEY_CLIENT_ID => (int)$split[0],
            self::KEY_TITLE => trim($split[1])
        ];
    }
}