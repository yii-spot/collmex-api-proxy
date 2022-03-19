<?php

declare(strict_types=1);

namespace App\Repository\Collmex\ApiClient\BaseRequest;

class BaseRequest implements BaseRequestInterface
{
    private RequestTypeIdentifier $typeIdentifier;

    private int $clientId;

    /**
     * @param RequestTypeIdentifier $typeIdentifier
     * @param int $clientId
     */
    public function __construct(
        RequestTypeIdentifier $typeIdentifier,
        int                   $clientId
    ) {
        $this->typeIdentifier = $typeIdentifier;
        $this->clientId = $clientId;
    }

    /**
     * @inheritDoc
     */
    public function getTypeIdentifier(): RequestTypeIdentifier
    {
        return $this->typeIdentifier;
    }

    /**
     * @inheritDoc
     */
    public function setTypeIdentifier(RequestTypeIdentifier $typeIdentifier): BaseRequestInterface
    {
        $this->typeIdentifier = $typeIdentifier;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @inheritDoc
     */
    public function setClientId(int $clientId): BaseRequestInterface
    {
        $this->clientId = $clientId;
        return $this;
    }
}