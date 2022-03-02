<?php

declare(strict_types=1);

namespace App\Repository\Collmex\ApiClient;

use MarcusJaschen\Collmex\Client\ClientInterface as CollmexClientInterface;
use MarcusJaschen\Collmex\Client\Curl as CollmexCurlClient;

class ApiClient implements ApiClientInterface
{
    private ?ApiClientConfigInterface $apiClientConfig = null;

    private ?CollmexClientInterface $collmexApiClient = null;

    /**
     * @param ApiClientConfigInterface $apiClientConfig
     */
    public function __construct(ApiClientConfigInterface $apiClientConfig)
    {
        $this->apiClientConfig = $apiClientConfig;
    }

    /**
     * @inheritDoc
     */
    public function getApiClientConfig(): ?ApiClientConfigInterface
    {
        return $this->apiClientConfig;
    }

    /**
     * @inheritDoc
     */
    public function setApiClientConfig(?ApiClientConfigInterface $apiClientConfig): ApiClientInterface
    {
        $this->apiClientConfig = $apiClientConfig;
        return $this;
    }

    /**
     * @return CollmexClientInterface|null
     */
    public function getCollmexApiClient(): ?CollmexClientInterface
    {
        if (is_null($this->collmexApiClient)) {
            $clientConfig = $this->getApiClientConfig();

            $this->collmexApiClient = new CollmexCurlClient(
                $clientConfig->getApiUserName(),
                $clientConfig->getApiPassword(),
                (string)$clientConfig->getCustomerId()
            );
        }

        return $this->collmexApiClient;
    }
}
