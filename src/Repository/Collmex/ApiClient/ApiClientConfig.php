<?php

declare(strict_types=1);

namespace App\Repository\Collmex\ApiClient;

class ApiClientConfig implements ApiClientConfigInterface
{
    private ?string $customerId = null;

    private ?string $apiUser = null;

    private ?string $apiPassword = null;

    /**
     * @inheritDoc
     */
    public function __construct($customerId, $apiUser, $apiPassword)
    {
        $this->customerId = $customerId;
        $this->apiUser = $apiUser;
        $this->apiPassword = $apiPassword;
    }

    /**
     * @inheritDoc
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @inheritDoc
     */
    public function getApiUserName(): ?string
    {
        return $this->apiUser;
    }

    /**
     * @inheritDoc
     */
    public function getApiPassword(): ?string
    {
        return $this->apiPassword;
    }
}