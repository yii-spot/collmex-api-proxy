<?php

namespace App\Repository\Collmex\ApiClient\Type\Sales\Delivery;

use App\Repository\Collmex\ApiClient\ApiClientInterface;

interface DeliveryRequestFactoryInterface
{
    /**
     * @param int $clientId
     * @return DeliveryRequestInterface
     */
    public function createDeliveryRequest(
        int $clientId = ApiClientInterface::DEFAULT_COMPANY_CLIENT_ID
    ): DeliveryRequestInterface;
}