<?php

namespace App\Repository\Collmex\Type\Sales;

use App\Repository\Collmex\ApiClient\Type\Sales\Delivery\DeliveryRequestInterface;
use App\Repository\Collmex\Type\TypeIdentifier;

interface DeliveryRepositoryInterface
{
    public const KEY_DELIVERY_RAW_DATA = 'delivery_raw_data';

    /**
     * @param DeliveryRequestInterface $deliveryRequest
     * @return array
     * @throws \MarcusJaschen\Collmex\Client\Exception\RequestFailedException
     * @throws \MarcusJaschen\Collmex\Exception\InvalidResponseMimeTypeException
     * @throws \MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException
     */
    public function getDeliveryRaw(DeliveryRequestInterface $deliveryRequest): array;

    /**
     * @param DeliveryRequestInterface $deliveryRequest
     * @return array
     * @throws \MarcusJaschen\Collmex\Client\Exception\RequestFailedException
     * @throws \MarcusJaschen\Collmex\Exception\InvalidResponseMimeTypeException
     * @throws \MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException
     */
    public function getDelivery(DeliveryRequestInterface $deliveryRequest): array;
}