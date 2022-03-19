<?php

namespace App\Repository\Collmex\ApiClient\BaseRequest;

interface BaseRequestFactoryInterface
{
    public const DEFAULT_CLIENT_ID = 1;

    /**
     * @param RequestTypeIdentifier $typeIdentifier
     * @param int $clientId
     * @return BaseRequestInterface
     */
    public static function createBaseRequest(
        RequestTypeIdentifier $typeIdentifier,
        int                   $clientId = self::DEFAULT_CLIENT_ID
    ): BaseRequestInterface;
}