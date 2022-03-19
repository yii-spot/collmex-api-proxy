<?php

declare(strict_types=1);

namespace App\Repository\Collmex\ApiClient\BaseRequest;

class BaseRequestFactory implements BaseRequestFactoryInterface
{
    /**
     * @inheritDoc
     */
    public static function createBaseRequest(
        RequestTypeIdentifier $typeIdentifier,
        int                   $clientId = self::DEFAULT_CLIENT_ID
    ): BaseRequestInterface {
        return new BaseRequest($typeIdentifier, $clientId);
    }
}