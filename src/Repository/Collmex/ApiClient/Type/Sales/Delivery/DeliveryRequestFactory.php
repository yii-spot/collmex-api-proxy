<?php

declare(strict_types=1);

namespace App\Repository\Collmex\ApiClient\Type\Sales\Delivery;

use App\Repository\Collmex\ApiClient\ApiClientInterface;
use App\Repository\Collmex\ApiClient\BaseRequest\BaseRequestFactoryInterface;

class DeliveryRequestFactory implements DeliveryRequestFactoryInterface
{
    private BaseRequestFactoryInterface $baseRequestFactory;

    /**
     * @param BaseRequestFactoryInterface $baseRequestFactory
     */
    public function __construct(
        BaseRequestFactoryInterface $baseRequestFactory
    ) {
        $this->baseRequestFactory = $baseRequestFactory;
    }

    /**
     * @inheritDoc
     */
    public function createDeliveryRequest(
        int $clientId = ApiClientInterface::DEFAULT_COMPANY_CLIENT_ID
    ): DeliveryRequestInterface {
        return new DeliveryRequest(
            $this->baseRequestFactory,
            DeliveryRequestInterface::TYPE_IDENTIFIER,
            $clientId
        );
    }
}