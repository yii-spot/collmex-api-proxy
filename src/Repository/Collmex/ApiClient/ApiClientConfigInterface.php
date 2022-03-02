<?php

namespace App\Repository\Collmex\ApiClient;

interface ApiClientConfigInterface
{
    /**
     * @param string $customerId
     * @param string $apiUser
     * @param string $apiPassword
     */
    public function __construct(string $customerId, string $apiUser, string $apiPassword);

    /**
     * @return string|null
     */
    public function getCustomerId(): ?string;

    /**
     * @return string|null
     */
    public function getApiUserName(): ?string;

    /**
     * @return string|null
     */
    public function getApiPassword(): ?string;
}