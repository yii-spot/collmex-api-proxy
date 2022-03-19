<?php

namespace App\Repository\Collmex\ApiClient\BaseRequest;

interface BaseRequestInterface
{
    public const KEY_TYPE_IDENTIFIER = 'type_identifier';

    public const KEY_CLIENT_ID = 'client_id';

    /**
     * @return RequestTypeIdentifier
     */
    public function getTypeIdentifier(): RequestTypeIdentifier;

    /**
     * @param RequestTypeIdentifier $typeIdentifier
     * @return BaseRequestInterface
     */
    public function setTypeIdentifier(RequestTypeIdentifier $typeIdentifier): BaseRequestInterface;

    /**
     * @return int
     */
    public function getClientId(): int;

    /**
     * @param int $clientId
     * @return BaseRequestInterface
     */
    public function setClientId(int $clientId): BaseRequestInterface;
}