<?php

namespace App\Repository\Collmex\Type\System;

interface ClientRepositoryInterface
{
    public const KEY_CLIENT_ID = 'client_id';

    public const KEY_TITLE = 'title';

    /**
     * @param string $clientRaw
     * @return array
     */
    public function extractFromRawValue(string $clientRaw): array;
}