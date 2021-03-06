<?php

namespace App\Repository\Collmex\ApiClient;

use MarcusJaschen\Collmex\Client\ClientInterface as CollmexClientInterface;

interface ApiClientInterface
{
    public const DEFAULT_COMPANY_CLIENT_ID = 1;

    /**
     * @return ApiClientConfigInterface|null
     */
    public function getApiClientConfig(): ?ApiClientConfigInterface;

    /**
     * @param ApiClientConfigInterface|null $clientConfig
     * @return ApiClientInterface
     */
    public function setApiClientConfig(?ApiClientConfigInterface $clientConfig): ApiClientInterface;

    /**
     * @return CollmexClientInterface|null
     */
    public function getCollmexApiClient(): ?CollmexClientInterface;
}
